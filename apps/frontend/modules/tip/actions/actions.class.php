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

class tipActions extends androWebActions
{
    public function executeIndex(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);

        $lang = $request->getParameter('lang');
        $date = $request->getParameter('date');

        $tip = null;

        if ($date) {
            $tht = TipHolidayTable::getInstance();
            $tip = $tht->getTip($date, $lang);
        }

        if (!$tip) {
            $tt = TipTable::getInstance();
            $tip = $tt->getTip($lang);
        }

        return $this->renderText($tip ? $tip->getContent() : 'Hum ... the website seems down');
    }
}
