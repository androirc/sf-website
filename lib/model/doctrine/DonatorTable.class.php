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

class DonatorTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Donator');
    }

    public function getAll()
    {
        return $this->createQuery('d')
                    ->orderBy('amount desc')
                    ->execute();
    }
}