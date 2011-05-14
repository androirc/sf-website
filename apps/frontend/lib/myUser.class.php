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
    protected $from;
    
    public function setFormat($format)
    {
        $this->setAttribute('format', $format);
    }
    
    public function getFormat()
    {
        return $this->getAttribute('format');
    }
    
    public function isFromMobile()
    {
        return 'mobile' === $this->from;
    }
    
    public function getFrom()
    {
        return $this->from;
    }
    
    public function setFrom($from)
    {
        $this->from = $from;
    }
    
    public function displayMobileVersion()
    {
        return 'mobile' === $this->getAttribute('format');
    }
    
    public function switchFormat()
    {
        $format = $this->getFormat();
        
        if ('mobile' === $format) {
            $format = null;
        }
        else {
            $format = 'mobile';
        }
        
        $this->setFormat($format);
    }
    
    public function hasFormat()
    {
        return $this->hasAttribute('format');
    }
}
