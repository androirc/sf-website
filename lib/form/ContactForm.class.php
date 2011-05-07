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

class ContactForm extends sfForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'name'      => new sfWidgetFormInputText(),
            'email'     => new sfWidgetFormInputText(),
            'message'   => new sfWidgetFormTextarea(),
            'captcha'   => new sfAnotherWidgetFormReCaptcha()
        ));
        
        $this->widgetSchema->setNameFormat('contact[%s]');
 
        $this->setValidators(array(
            'name'      => new sfValidatorString(),
            'email'     => new sfValidatorEmail(),
            'message'   => new sfValidatorString(array('max_length' => 1000)),
        ));
        
        $this->mergePostValidator(new sfAnotherValidatorSchemaReCaptcha($this, 'captcha'));
    }
}