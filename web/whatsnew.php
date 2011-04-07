<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
      body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        color: #8A8A8A;
        line-height: 1.5;
      }
      
      h1 {
        color: #026995;
        font-size: 18px;
      }
      
      .new {
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
<?php

if (isset($_GET['version']))
{
  $version = $_GET['version'];
  
  list($x) = explode('.', $version, 2); 
  $path = 'changelog/v' . $x . '/changelog.' . $version;
  $lines = file($path);
  
  echo '<h1>Changelog v' . $version . '</h1>'; 
  
  if ($lines == NULL)
  {
    echo 'No changelog is available for this release.';
    return;
  }
  
  $array = array();
  
  foreach($lines as $change)
  {
    if (substr($change, 0, 1) === '#')
      continue;
      
    $change = str_replace('\n', '', $change);
    $change = str_replace('\r', '', $change);
  
    list($key, $value) = explode(': ', $change, 2);
    
    if ($value == NULL)
    {
      $value = $key;
      $key = '';
    }
    
    $array[] = array('key' => $key, 'value' => $value);
  }

  usort($array, 'sort_changes');

  echo '<ul>';
  
  $tmp = $array[0]['key'];
  
  foreach($array as $line)
  {
    if ($tmp != $line['key'])
    {
      echo '<li class="new">';
      $tmp = $line['key'];
    }
    else
    {
      echo '<li>';
    }
    
    if ($line['key'] != '')
    {
      echo '<strong>' . $line['key'] . '</strong>: ';
    }
    
    echo $line['value'];
  }
  
  echo '</ul>';
}

function sort_changes($type1, $type2)
{
  return getIntegerType($type2['key']) - getIntegerType($type1['key']);
}

function getIntegerType($type)
{
  if ($type == 'added')
    return 3;
    
  if ($type == 'changed')
    return 2;
    
  if ($type == 'fixed')
    return 1;
    
  return 0;
}

?>
  </body>
</html>