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

class BetaRelease extends BaseBetaRelease
{
    private $downloads;

    public function getDownloads()
    {
        if ($this->downloads) {
            return $this->downloads;
        }

        $bdt = BetaDownloadTable::getInstance();

        return $this->downloads = $bdt->getDownloadsFromBeta($this);
    }
}