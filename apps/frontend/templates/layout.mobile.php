<?php
/* This code supports the ability for your website to set a cookie on behalf of AdMob
         * To set an AdMob cookie, simply call admob_setcookie() on any page that you call admob_request()
         * The call to admob_setcookie() must occur before any output has been written to the page (http://www.php.net/setcookie)
         * If your mobile site uses multiple subdomains (e.g. "a.example.com" and "b.example.com"), then pass the root domain of your mobile site (e.g. "example.com") as a parameter to admob_setcookie().
         * This will allow the AdMob cookie to be visible across subdomains
         */
        admob_setcookie();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
    <head>
        <title><?php include_slot('title', 'Home') ?> - AndroIRC (Android IRC Client)</title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;"/> 
        <link rel="shortcut icon" href="/favicon.ico" />
        
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/css/common.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="/css/mobile.css" /> 
        <link href="<?php echo url_for('@article_atom', true) ?>" type="application/atom+xml" rel="alternate" title="Last articles" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    </head>
    <body>
        <div id="up">
            <div id="header">
                <div id="logo">
                    <a href="<?php echo url_for('@homepage') ?>">
                        <?php echo image_tag('logo.png') ?>
                    </a>
                    <span>Android IRC Client</span>
                </div>
            </div>
        </div>
        <div id="menu">
            <ul>
                <li><a href="http://market.android.com/details?id=com.androirc">Download</a></li>
                <li><?php echo link_to('EULA', '@eula') ?></li>
                <li class="last"><?php echo link_to('Beta', '@beta') ?></li>
            </ul>
        </div>
        <div id="content">
            <div id="ads" class="center">
                <?php
                $admob_params = array(
                  'PUBLISHER_ID'      => 'a14de4eeeb0ee01',
                  'ANALYTICS_ID'      => 'a14debd8eddb7a3',
                  'AD_REQUEST'        => true,
                  'ANALYTICS_REQUEST' => false,
                  'TEST_MODE'         => false,
                  'OPTIONAL'          => array()
                );
                $admob_params['OPTIONAL']['k'] = "android irc client";

                // Send request to AdMob. To make additional ad requests per page, copy and paste this function call elsewhere on your page.
                echo admob_request($admob_params);
                ?>
            </div>
            <div id="switch">
                <a href="<?php echo str_replace('m.', 'www.', $sf_request->getUri()) ?>" class="button blue">Switch to the web version</a>
            </div>
            
            <?php echo $sf_content ?>
        </div>
        <div class="clear"></div>
        
        <div id="footer">
            Copyright &copy; AndroIRC.com. All rights reserved. Powered by <?php echo image_tag('symfony.gif', array('class' => 'famfamfam')) ?>
        </div>
        <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
            try {
                var pageTracker = _gat._getTracker("UA-133630-2");
                pageTracker._trackPageview();
            } catch(err) {}
        </script>
    </body>
</html>
<?php
// AdMob Publisher Code
// Language: PHP (curl)
// Version: 20081105
// Copyright AdMob, Inc., All rights reserved
// Documentation at http://developer.admob.com/wiki/Main_Page

/////////////////////////////////
// Do not edit below this line //
/////////////////////////////////

// This section defines AdMob functions and should be used AS IS.
// We recommend placing the following code in a separate file that is included where needed.

function admob_request($admob_params) {
  static $pixel_sent = false;

  $ad_mode = false;
  if (!empty($admob_params['AD_REQUEST']) && !empty($admob_params['PUBLISHER_ID'])) $ad_mode = true;
  
  $analytics_mode = false;
  if (!empty($admob_params['ANALYTICS_REQUEST']) && !empty($admob_params['ANALYTICS_ID']) && !$pixel_sent) $analytics_mode = true;
  
  $protocol = 'http';
  if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off') $protocol = 'https';
  
  $rt = $ad_mode ? ($analytics_mode ? 2 : 0) : ($analytics_mode ? 1 : -1);
  if ($rt == -1) return '';
  
  list($usec, $sec) = explode(' ', microtime()); 
  $params = array('rt=' . $rt,
                  'z=' . ($sec + $usec),
                  'u=' . urlencode($_SERVER['HTTP_USER_AGENT']), 
                  'i=' . urlencode($_SERVER['REMOTE_ADDR']), 
                  'p=' . urlencode("$protocol://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']),
                  'v=' . urlencode('20081105-PHPCURL-acda0040bcdea222')); 

  $sid = empty($admob_params['SID']) ? session_id() : $admob_params['SID'];
  if (!empty($sid)) $params[] = 't=' . md5($sid);
  if ($ad_mode) $params[] = 's=' . $admob_params['PUBLISHER_ID'];
  if ($analytics_mode) $params[] = 'a=' . $admob_params['ANALYTICS_ID'];
  if (!empty($_COOKIE['admobuu'])) $params[] = 'o=' . $_COOKIE['admobuu'];
  if (!empty($admob_params['TEST_MODE'])) $params[] = 'm=test';

  if (!empty($admob_params['OPTIONAL'])) {
    foreach ($admob_params['OPTIONAL'] as $k => $v) {
      $params[] = urlencode($k) . '=' . urlencode($v);
    }
  }

  $ignore = array('HTTP_PRAGMA' => true, 'HTTP_CACHE_CONTROL' => true, 'HTTP_CONNECTION' => true, 'HTTP_USER_AGENT' => true, 'HTTP_COOKIE' => true);
  foreach ($_SERVER as $k => $v) {
    if (substr($k, 0, 4) == 'HTTP' && empty($ignore[$k]) && isset($v)) {
      $params[] = urlencode('h[' . $k . ']') . '=' . urlencode($v);
    }
  }
  
  $post = implode('&', $params);
  $request = curl_init();
  $request_timeout = 1; // 1 second timeout
  curl_setopt($request, CURLOPT_URL, 'http://r.admob.com/ad_source.php');
  curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($request, CURLOPT_TIMEOUT, $request_timeout);
  curl_setopt($request, CURLOPT_CONNECTTIMEOUT, $request_timeout);
  curl_setopt($request, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Connection: Close'));
  curl_setopt($request, CURLOPT_POSTFIELDS, $post);
  list($usec_start, $sec_start) = explode(' ', microtime());
  $contents = curl_exec($request);
  list($usec_end, $sec_end) = explode(' ', microtime());
  curl_close($request);

  if ($contents === true || $contents === false) $contents = '';

  if (!$pixel_sent) {
    $pixel_sent = true;
    $contents .= "<img src=\"$protocol://p.admob.com/e0?"
              . 'rt=' . $rt
              . '&amp;z=' . ($sec + $usec)
              . '&amp;a=' . ($analytics_mode ? $admob_params['ANALYTICS_ID'] : '')
              . '&amp;s=' . ($ad_mode ? $admob_params['PUBLISHER_ID'] : '')
              . '&amp;o=' . (empty($_COOKIE['admobuu']) ? '' : $_COOKIE['admobuu'])
              . '&amp;lt=' . ($sec_end + $usec_end - $sec_start - $usec_start)
              . '&amp;to=' . $request_timeout
              . '" alt="" width="1" height="1"/>';
  }
  
  return $contents;
}

function admob_setcookie($domain = '', $path = '/') {
  if (empty($_COOKIE['admobuu'])) {    
    $value = md5(uniqid(rand(), true));
    if (!empty($domain) && $domain[0] != '.') $domain = ".$domain";
    if (setcookie('admobuu', $value, mktime(0, 0, 0, 1, 1, 2038), $path, $domain)) {
      $_COOKIE['admobuu'] = $value; // make it visible to admob_request()
    } 
  }
}
?>
