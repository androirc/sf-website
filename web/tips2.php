<?php

require_once 'includes/sqlmanager.class.php';
$db = new SQLManager();

$messages = array(
                '01/01' => array(
                                'fr' => 'Bonne année :o) !',
                                'en' => 'Happy new year to you !'
                 ),
                '14/02' => array(
                                'fr' => 'Bonne Saint-Valentin !',
                                'en' => 'Want to be my valentine? <3'
                 ),
                '17/03' => array(
                                'fr' => '',
                                'en' => 'It\'s St. Patrick\'s day, time to get some booze!'
                 ),
                '17/03' => array(
                                'fr' => 'Farce ou friandise ?',
                                'en' => 'Trick or treat?'
                 ),
                 '24/12' => array(
                                'fr' => 'Nous vous souhaitons un joyeux Noël !',
                                'en' => 'We wish you a merry christmas... *sings*'
                 ),
                 '25/12' => array(
                                'fr' => 'Nous vous souhaitons un joyeux Noël !',
                                'en' => 'We wish you a merry christmas... *sings*'
                 ),
                 '26/12' => array(
                                'fr' => 'Nous vous souhaitons un joyeux Noël !',
                                'en' => 'We wish you a merry christmas... *sings*'
                 )
                 
);
       

if (isset($_GET['lang']))
{
    $lang = 'en';

    if ($_GET['lang'] == 'fr')
        $lang = 'fr';
        
    if (isset($_GET['date']))
    {
        list($years, $months, $days) = explode('-', $_GET['date']);
        
        $key =  $days . '/' . $months;
        
        if (array_key_exists($key, $messages))
        {    
            echo $messages[$key][$lang];
            return;
        }
    }
    
    $sql = "SELECT tipsText FROM andro_tips WHERE tipsLang='$lang' ORDER BY RAND() LIMIT 0,1";
    $query = $db->query($sql);
    $data = mysql_fetch_object($query);

    echo $data->tipsText;
}

?>
