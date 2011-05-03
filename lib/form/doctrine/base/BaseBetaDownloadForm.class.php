<?php

/**
 * BetaDownload form base class.
 *
 * @method BetaDownload getObject() Returns the current form's model object
 *
 * @package    androirc
 * @subpackage form
 * @author     MewT
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBetaDownloadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'beta_release_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BetaRelease'), 'add_empty' => true)),
      'location'        => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'beta_release_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BetaRelease'), 'required' => false)),
      'location'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('beta_download[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BetaDownload';
  }

}
