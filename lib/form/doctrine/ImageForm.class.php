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

class ImageForm extends BaseImageForm
{
    public function configure()
    {
        unset($this['created_at'], $this['updated_at']);
        
        $this->widgetSchema['sf_guard_user_id'] = new sfWidgetFormInputHidden();
        
         $this->widgetSchema['path'] = new androWidgetFormInputFile(array(
                'label' => 'Image',
                'edit_mode' => !$this->isNew(),
                'file_src' => $this->getObject()->getPath(),
                'path' => '/image/thumbnail/',
        ));
        
        $this->validatorSchema['path'] = new sfValidatorFile(array(
                'required' => true,
                'path' => sfConfig::get('sf_upload_dir').'/images',
                'mime_types' => 'web_images'
        ));
    }
}
