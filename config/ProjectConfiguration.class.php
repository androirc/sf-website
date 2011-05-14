<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration 
{

    public function setup() 
    {
        $this->enablePlugins('sfDoctrinePlugin');
        $this->enablePlugins('sfDoctrineGuardPlugin');
        $this->enablePlugins('sfAnotherReCaptchaPlugin');

        $this->dispatcher->connect('request.filter_parameters', array($this, 'filterRequestParameters'));
    }
    
    public function filterRequestParameters(sfEvent $event, $parameters)
    {
        $request = $event->getSubject();
        
         $list = array('iPhone','Android','MIDP','Opera Mobi',  
                      'Opera Mini','BlackBerry','HP iPAQ','IEMobile',  
                      'MSIEMobile','Windows Phone','HTC','LG',  
                      'MOT','Nokia','Symbian','Fennec',  
                      'Maemo','Tear','Midori','armv',  
                      'Windows CE','WindowsCE','Smartphone','240x320',  
                      '176x220','320x320','160x160','webOS',  
                      'Palm','Sagem','Samsung','SGH',  
                      'SIE','SonyEricsson','MMP','UCWEB');
         
         $ua = $request->getHttpHeader('User-Agent');
         
         $onMobile = false;
         
         foreach($list as $tmp)
         {
             if (preg_match('#'. $tmp .'#', $ua)) {
                 $onMobile = true;
                 break;
             }
         }

         return $parameters;
    }
}
