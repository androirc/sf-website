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

class AdMob
{
    private $request;
    private $response;
    
    protected $publisher_id;
    protected $analytics_id;
    protected $ad_request;
    protected $analytics_request;
    protected $test_mode;
    protected $optional;
    protected $session_id;
    
    protected static $pixel_sent;
    
    public function __construct(sfWebRequest $request, sfWebResponse $response)
    {
        $this->request = $request;
        $this->response = $response;
        
        $this->publisher_id = sfConfig::get('app_admob_publisher_id');
        $this->analytics_id = sfConfig::get('app_admob_analytics_id');
        
        $this->ad_request = sfConfig::get('app_admob_ad_request', true);
        $this->analytics_request = sfConfig::get('app_admob_analytics_request', false);
        $this->test_mode = sfConfig::get('app_admob_test_mode', true);
        $this->optional = array();
    }
    
    public function request()
    {
        self::$pixel_sent = false;
        
        $ad_mode = false;
        if ($this->ad_request && $this->publisher_id) $ad_mode = true;
  
        $analytics_mode = false;
        if ($this->analytics_request && $this->analytics_id && !self::$pixel_sent) $analytics_mode = true;
        
        $protocol = ($this->request->isSecure()) ? 'https' : 'http';
  
        $rt = $ad_mode ? ($analytics_mode ? 2 : 0) : ($analytics_mode ? 1 : -1);
        if ($rt == -1) return '';
  
        $path = $this->request->getPathInfoArray();
        
        list($usec, $sec) = explode(' ', microtime()); 
        $params = array('rt=' . $rt,
                  'z=' . ($sec + $usec),
                  'u=' . urlencode($path['HTTP_USER_AGENT']), 
                  'i=' . urlencode($path['REMOTE_ADDR']), 
                  'p=' . urlencode("$protocol://" . $path['HTTP_HOST'] . $path['REQUEST_URI']),
                  'v=' . urlencode('20081105-PHPCURL-acda0040bcdea222')); 

        $sid = empty($this->session_id) ? session_id() : $this->session_id;
        
        if (!empty($sid)) $params[] = 't=' . md5($sid);
        if ($ad_mode) $params[] = 's=' . $this->publisher_id;
        if ($analytics_mode) $params[] = 'a=' . $this->analytics_id;
        if ($this->request->getCookie('admobuu')) $params[] = 'o=' . $this->request->getCookie('admobuu');
        if (!empty($this->test_mode)) $params[] = 'm=test';

        if (!empty($this->optional)) {
            foreach ($this->optional as $k => $v) {
                $params[] = urlencode($k) . '=' . urlencode($v);
            }
        }

        $ignore = array(
            'HTTP_PRAGMA' => true,
            'HTTP_CACHE_CONTROL' => true,
            'HTTP_CONNECTION' => true,
            'HTTP_USER_AGENT' => true,
            'HTTP_COOKIE' => true
        );
        
        foreach ($path as $k => $v) {
            if (substr($k, 0, 4) == 'HTTP' && empty($ignore[$k]) && isset($v)) {
                $params[] = urlencode('h[' . $k . ']') . '=' . urlencode($v);
            }
        }
  
        $post = implode('&', $params);
  
        $curl = curl_init();
        $curl_timeout = 1; // 1 second timeout
        
        curl_setopt($curl, CURLOPT_URL, 'http://r.admob.com/ad_source.php');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, $curl_timeout);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $curl_timeout);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Connection: Close'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        
        list($usec_start, $sec_start) = explode(' ', microtime());
        
        $contents = curl_exec($curl);
        
        list($usec_end, $sec_end) = explode(' ', microtime());
        curl_close($curl);

        if ($contents === true || $contents === false) $contents = '';

        if (!self::$pixel_sent) 
        {
            self::$pixel_sent = true;
            
            $contents .= "<img src=\"$protocol://p.admob.com/e0?"
                  . 'rt=' . $rt
                  . '&amp;z=' . ($sec + $usec)
                  . '&amp;a=' . ($analytics_mode ? $this->analytics_id : '')
                  . '&amp;s=' . ($ad_mode ? $this->publisher_id : '')
                  . '&amp;o=' . (!$this->request->getCookie('admobuu') ? '' : $this->request->getCookie('admobuu'))
                  . '&amp;lt=' . ($sec_end + $usec_end - $sec_start - $usec_start)
                  . '&amp;to=' . $curl_timeout
                  . '" alt="" width="1" height="1"/>';
        }
  
        return $contents;
    }
    
    public function setCookie($domain = '', $path = '/')
    {
        if (!$this->request->getCookie('admobuu')) 
        {
            $value = md5(uniqid(rand(), true));
            
            if (!empty($domain) && $domain[0] != '.') $domain = ".$domain";
            
            $this->response->setCookie('admobuu', $value, mktime(0, 0, 0, 1, 1, 2038), $path, $domain);
            
        }
    }
}