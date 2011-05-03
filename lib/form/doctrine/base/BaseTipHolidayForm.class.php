<?php

/**
 * TipHoliday form base class.
 *
 * @method TipHoliday getObject() Returns the current form's model object
 *
 * @package    androirc
 * @subpackage form
 * @author     MewT
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTipHolidayForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'language'   => new sfWidgetFormInputText(),
      'date_start' => new sfWidgetFormDate(),
      'date_end'   => new sfWidgetFormDate(),
      'content'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'language'   => new sfValidatorString(array('max_length' => 2)),
      'date_start' => new sfValidatorDate(),
      'date_end'   => new sfValidatorDate(array('required' => false)),
      'content'    => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tip_holiday[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipHoliday';
  }

}
