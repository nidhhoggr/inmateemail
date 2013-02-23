<?php

/**
 * EmailIncoming form base class.
 *
 * @method EmailIncoming getObject() Returns the current form's model object
 *
 * @package    projectname
 * @subpackage form
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEmailIncomingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'email_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Email'), 'add_empty' => false)),
      'sender_email'       => new sfWidgetFormInputText(),
      'inmate_viewed'      => new sfWidgetFormInputCheckbox(),
      'date_inmate_viewed' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Email'))),
      'sender_email'       => new sfValidatorString(array('max_length' => 128)),
      'inmate_viewed'      => new sfValidatorBoolean(array('required' => false)),
      'date_inmate_viewed' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email_incoming[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailIncoming';
  }

}
