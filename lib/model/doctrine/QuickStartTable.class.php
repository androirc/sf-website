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

class QuickStartTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('QuickStart');
    }
    
    public function getQuickStart($version, $lang = 'en')
    {   
        $version = QuickStart::versionToInteger($version);
 
        $quickstarts = $this->createQuery('q')
                            ->where('q.language = ?', $lang)
                            ->execute();
        
        if (false === $quickstarts) {
            return null;
        }
        
        foreach ($quickstarts as $quickstart)
        {
            $versionMin = QuickStart::versionToInteger($quickstart->getVersionMin());
            $versionMax = QuickStart::versionToInteger($quickstart->getVersionMax());
            
            if ($versionMin <= $version && $version <= $versionMax) {
                return $quickstart;
            }
        }
        
        return null;
    }
}