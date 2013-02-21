<?php

/**
 * Contact form base class.
 *
 * @method Contact getObject() Returns the current form's model object
 *
 * @package    projectname
 * @subpackage form
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'email_address' => new sfWidgetFormInputText(),
      'first_name'    => new sfWidgetFormInputText(),
      'last_name'     => new sfWidgetFormInputText(),
      'phone_number'  => new sfWidgetFormInputText(),
      'is_approved'   => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email_address' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'first_name'    => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'last_name'     => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'phone_number'  => new sfValidatorInteger(array('required' => false)),
      'is_approved'   => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contact';
  }

}
