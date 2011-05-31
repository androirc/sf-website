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

class imageActions extends sfActions
{
    public function executeGet(sfWebRequest $request)
    {
        $image = $request->getParameter('image');
        
        $this->forward404Unless($image);
        
        // have fun!
    }
}
