<?php

/**
 * Tip filter form base class.
 *
 * @package    androirc
 * @subpackage filter
 * @author     MewT
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTipFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'language' => new sfWidgetFormChoice(array('choices' => array('' => '', 'fr' => 'fr', 'en' => 'en'))),
      'content'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'language' => new sfValidatorChoice(array('required' => false, 'choices' => array('fr' => 'fr', 'en' => 'en'))),
      'content'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tip_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tip';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'language' => 'Enum',
      'content'  => 'Text',
    );
  }
}
