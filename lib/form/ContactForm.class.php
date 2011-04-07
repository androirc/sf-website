<?php
class ContactForm extends sfForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'name'      => new sfWidgetFormInputText(),
            'email'     => new sfWidgetFormInputText(),
            'message'   => new sfWidgetFormTextarea()
        ));
        
        $this->widgetSchema->setNameFormat('contact[%s]');
 
        $this->setValidators(array(
            'name'      => new sfValidatorString(),
            'email'     => new sfValidatorEmail(),
            'message'   => new sfValidatorString(array('max_length' => 1000)),
        ));
  }
}

?>