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

class MobileFilter extends sfFilter 
{
    public function execute($filterChain) 
    {
        $user = $this->getContext()->getUser();
        $request = $this->getContext()->getRequest();

        $user->setFrom(null);

        $uamatches = array('midp', 'j2me', 'avantg', 'docomo', 'novarra', 'palmos', 'palmsource', '240x320', 'opwv', 'chtml', 'pda', 'windows ce', 'mmp\/', 'blackberry', 'mib\/', 'symbian', 'wireless', 'nokia', 'hand', 'mobi', 'phone', 'cdm', 'up\.b', 'audio', 'SIE\-', 'SEC\-', 'samsung', 'HTC', 'mot\-', 'mitsu', 'sagem', 'sony', 'alcatel', 'lg', 'erics', 'vx', 'NEC', 'philips', 'mmm', 'xx', 'panasonic', 'sharp', 'wap', 'sch', 'rover', 'pocket', 'benq', 'java', 'pt', 'pg', 'vox', 'amoi', 'bird', 'compal', 'kg', 'voda', 'sany', 'kdd', 'dbt', 'sendo', 'sgh', 'webos');

        foreach ($uamatches as $uastring) {
            if (preg_match('/' . $uastring . '/i', $request->getHttpHeader('User-Agent'))) {
                $user->setFrom('mobile');
                break;
            }
        }
        
        if (!$user->hasFormat()) {
            $user->setFormat($user->getFrom());
        }
        
        $request->setRequestFormat($user->getFormat());

        $filterChain->execute();
    }
}
