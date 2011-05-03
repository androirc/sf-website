<?php

$lang = $_GET['lang'];
$date = $_GET['date'];

$url = '/tip/' . $lang;

if ($date) {
    $url .= '/' . $date;
}

header('Status: 301 Moved Permanently', false, 301);   
header('Location: ' . $url);   

