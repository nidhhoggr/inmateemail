<?php

/**
 * Inmate form base class.
 *
 * @method Inmate getObject() Returns the current form's model object
 *
 * @package    projectname
 * @subpackage form
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInmateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'email_number'        => new sfWidgetFormInputText(),
      'jail_number'         => new sfWidgetFormInputText(),
      'balance'             => new sfWidgetFormInputText(),
      'contacts_approvable' => new sfWidgetFormInputCheckbox(),
      'emails_approvable'   => new sfWidgetFormInputCheckbox(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'email_number'        => new sfValidatorInteger(),
      'jail_number'         => new sfValidatorInteger(array('required' => false)),
      'balance'             => new sfValidatorPass(array('required' => false)),
      'contacts_approvable' => new sfValidatorBoolean(array('required' => false)),
      'emails_approvable'   => new sfValidatorBoolean(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('inmate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inmate';
  }

}
