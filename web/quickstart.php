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
      
      p {
        text-align: justify;
        padding: 0 5px;
      }
    </style>
  </head>
  <body>
<?php

if (isset($_GET['lang']) && isset($_GET['version']))
{
  require_once 'includes/sqlmanager.class.php';
  $db = new SQLManager();
  
  $lang = 'en';
  $version = explodeVersion($_GET['version']);

  if ($_GET['lang'] == 'fr')
    $lang = 'fr';

  $sql = "SELECT * FROM andro_quickstart WHERE lang='$lang' ORDER BY version_min";
  $query = $db->query($sql);
  
  while ($data = mysql_fetch_object($query))
  {
    $version_min = explodeVersion($data->version_min);
    $version_max = explodeVersion($data->version_max);
    
    if ($version_min <= $version && $version <= $version_max)
    {
      echo $data->content;
      return;
    }
  }
  
  echo 'No help ... yet!';
}

function explodeVersion($version)
{
  $str = str_replace('.', '', $version);

  while (strlen($str) < 3)
  {
    $str = $str . '0';
  }

  return (int)$str;
}

?>
  </body>
</html>
