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

class QuickStart extends BaseQuickStart
{
    public static function versionToInteger($version)
    {
        $version = str_replace('.', '', $version);

        if (0 == $version) {
            return 0;
        }

        while (strlen($version) != 3) {
            $version *= 10;
        }

        return $version;
    }
}