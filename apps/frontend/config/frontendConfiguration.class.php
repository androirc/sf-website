<?php

class frontendConfiguration extends sfApplicationConfiguration
{
    public function configure()
    {
        $this->dispatcher->connect('request.filter_parameters', array($this, 'filterRequestParameters'));
    }

    public function filterRequestParameters(sfEvent $event, $parameters)
    {
        $request = $event->getSubject();
        
        $uamatches = array('midp', 'j2me', 'avantg', 'docomo', 'novarra', 'palmos', 'palmsource', '240x320', 'opwv', 'chtml', 'pda', 'windows ce', 'mmp\/', 'blackberry', 'mib\/', 'symbian', 'wireless', 'nokia', 'hand', 'mobi', 'phone', 'cdm', 'up\.b', 'audio', 'SIE\-', 'SEC\-', 'samsung', 'HTC', 'mot\-', 'mitsu', 'sagem', 'sony', 'alcatel', 'lg', 'erics', 'vx', 'NEC', 'philips', 'mmm', 'xx', 'panasonic', 'sharp', 'wap', 'sch', 'rover', 'pocket', 'benq', 'java', 'pt', 'pg', 'vox', 'amoi', 'bird', 'compal', 'kg', 'voda', 'sany', 'kdd', 'dbt', 'sendo', 'sgh', 'webos');
        
        foreach ($uamatches as $uastring) {
            if (preg_match('/' . $uastring . '/i', $request->getHttpHeader('User-Agent'))) {
                $request->setRequestFormat('mobile');
                break;
            }
        }
        
        return $parameters;
    }
}
