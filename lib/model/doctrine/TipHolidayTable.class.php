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

class TipHolidayTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TipHoliday');
    }

    public function getTip($date, $lang = 'en')
    {
        if (null === $date) {
            return null;
        }

        list($year, $month, $day) = explode('-', $date);

        $tip = $this->createQuery('t')
                    ->where('t.language = ?', $lang)
                    ->andWhere('month(t.date) = ?', $month)
                    ->andWhere('day(t.date) = ?', $day)
                    ->execute()
                    ->getFirst();

        if (false === $tip) {
            return null;
        }

        return $tip;
    }
}