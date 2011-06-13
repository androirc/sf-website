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

class CrashReportTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CrashReport');
    }
    
    public function alreadyExist(CrashReport $cr)
    {
        $crashreports = $this->createQuery('c')
                             ->orderBy('c.created_at desc')
                             ->execute();
        
        foreach ($crashreports as $crashreport) {
            if ($cr->getCrashMessage() == $crashreport->getCrashMessage()
                    && $cr->getCrashLocation() == $crashreport->getCrashLocation()) {
                return $crashreport;
            }
        }
        
        return false;
    }
    
    public function deleteAll()
    {
        return $this->createQuery('c')
                    ->delete()
                    ->execute();
    }
}