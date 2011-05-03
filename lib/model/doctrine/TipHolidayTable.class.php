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
    
    public function retrieveMessageByDate($date, $lang = 'en')
    {
        if (null === $date) {
            return null;
        }
        
        $q = $this->createQuery('t')
                  ->where('t.lang = ?', $lang)
                  ->andWhere('t.date_start <= ?', $date)
                  ->andWhere('t.date_end >= ?', $date);
        
        $message = $q->execute();
        
        if (null === $message) {
            return null;
        }
        
        return $message->getContent();
    }
}