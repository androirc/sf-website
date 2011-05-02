<?php

/**
 * QuickStart filter form base class.
 *
 * @package    androirc
 * @subpackage filter
 * @author     MewT
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuickStartFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'language'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'verion_min' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'verion_max' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'language'   => new sfValidatorPass(array('required' => false)),
      'verion_min' => new sfValidatorPass(array('required' => false)),
      'verion_max' => new sfValidatorPass(array('required' => false)),
      'content'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('quick_start_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuickStart';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'language'   => 'Text',
      'verion_min' => 'Text',
      'verion_max' => 'Text',
      'content'    => 'Text',
    );
  }
}
