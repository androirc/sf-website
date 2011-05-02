<?php

/**
 * Article filter form base class.
 *
 * @package    androirc
 * @subpackage filter
 * @author     MewT
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseArticleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'title'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_visible'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'title'            => new sfValidatorPass(array('required' => false)),
      'content'          => new sfValidatorPass(array('required' => false)),
      'is_visible'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Article';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sf_guard_user_id' => 'ForeignKey',
      'title'            => 'Text',
      'content'          => 'Text',
      'is_visible'       => 'Boolean',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'slug'             => 'Text',
    );
  }
}
