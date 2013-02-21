<?php

/**
 * InmateContact form base class.
 *
 * @method InmateContact getObject() Returns the current form's model object
 *
 * @package    projectname
 * @subpackage form
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInmateContactForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'inmate_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Inmate'), 'add_empty' => false)),
      'contact_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Contact'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'inmate_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Inmate'))),
      'contact_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Contact'))),
    ));

    $this->widgetSchema->setNameFormat('inmate_contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InmateContact';
  }

}
