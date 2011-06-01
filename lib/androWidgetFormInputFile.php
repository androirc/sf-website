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

class androWidgetFormInputFile extends sfWidgetFormInputFile
{
    protected function configure($options = array(), $attributes = array())
    {
        parent::configure($options, $attributes);
        
        $this->addRequiredOption('file_src');
        
        $this->addOption('edit_mode', true);
        $this->addOption('path', '/');
    }
    
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        if (!$this->getOption('edit_mode')) {
            return parent::render($name, $value, $attributes, $errors);
        }
        
        $img = $this->renderTag('img', array_merge(array('src' => $this->getOption('path') . $this->getOption('file_src'), 'thumbnail' => 'true'), $attributes));
        
        return $img . '<br /><div class="code">' . htmlspecialchars($img) . '</div>';
    }
}