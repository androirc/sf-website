<?php

/*
 * This file is part of the AndroIRC website.
 *
 * (c) 2010-2011 Julien Brochet <mewt@androirc.com>
 * (c) 2010-2011 Sébastien Brochet <blinkseb@androirc.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$c = curl_init();

curl_setopt($c, CURLOPT_URL, 'http://www.androirc.com/crashreport');
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_POSTFIELDS, array(
    'phone_model' => get('phone_model'),
    'android_version' => get('android_version'),
    'thread_name' => get('thread_name'),
    'error_message' => get('error_message'),
    'callstack' => get('callstack'),
    'version' => get('version')
 ));

curl_exec ($c);
curl_close ($c); 

function get($name, $default = '')
{
    if (isset($_POST[$name])) {
        return $_POST[$name];
    }
    
    return $default;
}