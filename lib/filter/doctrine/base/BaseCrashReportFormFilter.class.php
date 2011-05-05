<?php

/**
 * CrashReport filter form base class.
 *
 * @package    androirc
 * @subpackage filter
 * @author     MewT
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCrashReportFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'phone_model'      => new sfWidgetFormFilterInput(),
      'android_version'  => new sfWidgetFormFilterInput(),
      'thread_name'      => new sfWidgetFormFilterInput(),
      'error_message'    => new sfWidgetFormFilterInput(),
      'callstack'        => new sfWidgetFormFilterInput(),
      'androirc_version' => new sfWidgetFormFilterInput(),
      'count'            => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'phone_model'      => new sfValidatorPass(array('required' => false)),
      'android_version'  => new sfValidatorPass(array('required' => false)),
      'thread_name'      => new sfValidatorPass(array('required' => false)),
      'error_message'    => new sfValidatorPass(array('required' => false)),
      'callstack'        => new sfValidatorPass(array('required' => false)),
      'androirc_version' => new sfValidatorPass(array('required' => false)),
      'count'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('crash_report_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrashReport';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'phone_model'      => 'Text',
      'android_version'  => 'Text',
      'thread_name'      => 'Text',
      'error_message'    => 'Text',
      'callstack'        => 'Text',
      'androirc_version' => 'Text',
      'count'            => 'Number',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
