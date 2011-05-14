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
        
        $user->setFormat($request->getRequestFormat());
        
        $filterChain->execute();
    }
}
