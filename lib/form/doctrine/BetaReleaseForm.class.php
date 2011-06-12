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

class BetaReleaseForm extends BaseBetaReleaseForm
{
    public function configure()
    {
        unset($this['created_at'], $this['updated_at']);
        
        $this->widgetSchema['file'] = new sfWidgetFormInputFileEditable(array(
            'label' => 'File',
            'edit_mode' => !$this->isNew(),
            'with_delete' => false,
            'is_image' => false,
            'file_src' => '/betas/' . $this->getObject()->getFile(),
        ));
                
        $this->validatorSchema['file'] = new sfValidatorFile(array(
            'required' => true,
            'path' => sfConfig::get('sf_upload_dir') . '/betas',
            'validated_file_class' => 'myValidatedFile',            
        ));
    }
}
