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

class Article extends BaseArticle
{
    private $summary;

    public function getSummary()
    {
        if ($this->summary) {
            return $this->summary;
        }

        $summary = strip_tags($this->getContent());

        if (strlen($summary) >= 200) {
            $summary = substr($summary, 0, 197) . '...';
        }

        return $this->summary = $summary;
    }
}