<?php

/**
 * CrashReport form base class.
 *
 * @method CrashReport getObject() Returns the current form's model object
 *
 * @package    androirc
 * @subpackage form
 * @author     MewT
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrashReportForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'phone_model'      => new sfWidgetFormInputText(),
      'android_version'  => new sfWidgetFormInputText(),
      'thread_name'      => new sfWidgetFormInputText(),
      'error_message'    => new sfWidgetFormTextarea(),
      'callstack'        => new sfWidgetFormTextarea(),
      'androirc_version' => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'phone_model'      => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'android_version'  => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'thread_name'      => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'error_message'    => new sfValidatorString(array('required' => false)),
      'callstack'        => new sfValidatorString(array('required' => false)),
      'androirc_version' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('crash_report[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrashReport';
  }

}
