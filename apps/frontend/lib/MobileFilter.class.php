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
        if ($this->isFirstCall())
        {
            $user = $this->getContext()->getUser();
            $request = $this->getContext()->getRequest();
            $controller = $this->getContext()->getController();

            $user->setFrom(null);

            $uamatches = array('midp', 'j2me', 'avantg', 'docomo', 'novarra', 'palmos', 'palmsource', '240x320', 'opwv', 'chtml', 'pda', 'windows ce', 'mmp\/', 'blackberry', 'mib\/', 'symbian', 'wireless', 'nokia', 'hand', 'mobi', 'phone', 'cdm', 'up\.b', 'audio', 'SIE\-', 'SEC\-', 'samsung', 'HTC', 'mot\-', 'mitsu', 'sagem', 'sony', 'alcatel', 'lg', 'erics', 'vx', 'NEC', 'philips', 'mmm', 'xx', 'panasonic', 'sharp', 'wap', 'sch', 'rover', 'pocket', 'benq', 'java', 'pt', 'pg', 'vox', 'amoi', 'bird', 'compal', 'kg', 'voda', 'sany', 'kdd', 'dbt', 'sendo', 'sgh', 'webos');

            foreach ($uamatches as $uastring) {
                if (preg_match('/' . $uastring . '/i', $request->getHttpHeader('User-Agent'))) {
                    $user->setFrom('mobile');
                    break;
                }
            }
            
            if (sfConfig::get('app_mobile_display_always', false) || preg_match('/^m\./i', $request->getHost())) 
            {
                $request->setRequestFormat('mobile');
            }
            else if ($user->isFirstVisit() && $user->isFromMobile()) 
            {
                $user->setFirstVisit(false);

                if (sfConfig::get('app_mobile_force_redirection', true)) {
                    $controller->redirect(str_replace('www.', 'm.', $request->getUri()), 0, 302);
                }
            }
        }

        $filterChain->execute();
    }
}
