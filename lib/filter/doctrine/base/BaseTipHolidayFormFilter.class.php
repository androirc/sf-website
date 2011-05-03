<?php

/**
 * TipHoliday filter form base class.
 *
 * @package    androirc
 * @subpackage filter
 * @author     MewT
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTipHolidayFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'language' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'content'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'language' => new sfValidatorPass(array('required' => false)),
      'date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'content'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tip_holiday_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipHoliday';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'language' => 'Text',
      'date'     => 'Date',
      'content'  => 'Text',
    );
  }
}
