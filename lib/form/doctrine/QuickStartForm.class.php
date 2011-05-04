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

class QuickStartForm extends BaseQuickStartForm
{
    public function configure()
    {
        $this->widgetSchema['language'] = new sfWidgetFormChoice(array('choices' => array('fr' => 'French', 'en' => 'English')));
        
        $this->validatorSchema['language'] = new sfValidatorChoice(array('choices' => array(0 => 'French', 1 => 'English'), 'required' => false));
    } 
}
