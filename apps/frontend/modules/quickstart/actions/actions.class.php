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

class quickstartActions extends androWebActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->setLayout(false);
        sfConfig::set('sf_web_debug', false);
        
        $this->quickstart = null;
        
        $lang = $request->getParameter('lang', 'en');
        $version = $request->getParameter('version');
        
        if ($version)
        {
            $qst = QuickStartTable::getInstance();
            
            $this->quickstart = $qst->getQuickStart($version, $lang);
        }
    }
}
