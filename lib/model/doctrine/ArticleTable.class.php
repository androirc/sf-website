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

class ArticleTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Article');
    }

    public function getLastArticles($limit = 10)
    {
        return $this->createQuery('a')
                    ->leftJoin('a.sfGuardUser u')
                    ->where('a.is_visible = ?', true)
                    ->orderBy('id desc')
                    ->limit($limit)
                    ->execute();
    }
}