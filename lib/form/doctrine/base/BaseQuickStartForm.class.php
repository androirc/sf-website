<?php

/**
 * QuickStart form base class.
 *
 * @method QuickStart getObject() Returns the current form's model object
 *
 * @package    androirc
 * @subpackage form
 * @author     MewT
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuickStartForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'language'   => new sfWidgetFormInputText(),
      'verion_min' => new sfWidgetFormInputText(),
      'verion_max' => new sfWidgetFormInputText(),
      'content'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'language'   => new sfValidatorString(array('max_length' => 2)),
      'verion_min' => new sfValidatorString(array('max_length' => 20)),
      'verion_max' => new sfValidatorString(array('max_length' => 20)),
      'content'    => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('quick_start[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuickStart';
  }

}
