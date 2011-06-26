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

class ChangeLog extends BaseChangeLog
{
    private $changes;

    public function getChanges()
    {
        if ($this->changes) {
            return $this->changes;
        }

        $file = @file(sfConfig::get('sf_upload_dir') . '/changelogs/' . $this->getFile(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (null === $file) {
            return null;
        }

        $changes = array();

        foreach($file as $change)
        {
            if ('#' === substr($change, 0, 1)) {
                continue;
            }

            $pos = strpos($change, ':');

            if (false === $pos) {
                $changes[] = array(
                    'key' => '',
                    'content' => trim($change)
                );
            }
            else {
                list($key, $value) = explode(':', $change, 2);

                $changes[] = array(
                    'key' => $key,
                    'content' => trim($value)
                );
            }
        }

        usort($changes, array($this, 'sortChanges'));

        return $this->changes = $changes;
    }

    private function sortChanges($a, $b)
    {
        return self::typeToInteger($b['key']) - self::typeToInteger($a['key']);
    }

    public static function typeToInteger($type)
    {
        switch($type)
        {
            case 'added':
                return 3;
            case 'changed':
                return 2;
            case 'fixed':
                return 1;
            default:
                return 0;
        }
    }
}
