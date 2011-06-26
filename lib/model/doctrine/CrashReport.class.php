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

class CrashReport extends BaseCrashReport
{
    private $explodedCallstack;

    public function getCrashLocation()
    {
        $lines = $this->getExplodedCallstack();

        foreach ($lines as $line) {
            if (preg_match('#at com.androirc#', $line)) {
                return $line;
            }
        }

        return null;
    }

    public function getCrashMessage()
    {
        $lines = $this->getExplodedCallstack();

        return $lines[0];
    }

    private function getExplodedCallstack()
    {
        if ($this->explodedCallstack) {
            return $this->explodedCallstack;
        }

        $lines = explode("\n", $this->getCallstack());

        for ($i = 0 ; $i < count($lines) ; $i++)
        {
            $lines[$i] = trim($lines[$i]);

            if ('' == $lines[$i])
            {
                unset($lines[$i]);
                continue;
            }
        }

        return $this->explodedCallstack = $lines;
    }

    public function incCount($by = 1)
    {
        $this->setCount($this->getCount() + $by);

        return $this->getCount();
    }
}