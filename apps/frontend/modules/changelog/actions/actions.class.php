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

class changelogActions extends androWebActions
{
    public function executeIndex(sfWebRequest $request)
    {        
        $this->setLayout(false);
        sfConfig::set('sf_web_debug', false);
        
        $version = $request->getParameter('version');
        
        $this->forward404Unless($version);
        
        $clt = ChangeLogTable::getInstance();
        
        $this->changelog = $clt->findOneBy('version', $version);
    }
}
