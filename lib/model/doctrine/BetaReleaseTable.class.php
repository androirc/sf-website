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

class BetaReleaseTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BetaRelease');
    }
    
    public function getLastBeta()
    {
        return $this->createQuery('b')
                    ->where('b.is_downloadable = ?', true)
                    ->orderBy('b.created_at desc')
                    ->execute()
                    ->getFirst();
    }
}