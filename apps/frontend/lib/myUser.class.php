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

class myUser extends sfBasicSecurityUser
{
    protected $format;
    
    public function setFormat($format)
    {
        $this->format = $format;
    }
    
    public function getFormat()
    {
        return $this->format;
    }
    
    public function isMobile()
    {
        return 'mobile' === $this->format;
    }
}
