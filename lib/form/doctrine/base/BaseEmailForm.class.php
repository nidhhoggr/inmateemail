<?php

/**
 * Email form base class.
 *
 * @method Email getObject() Returns the current form's model object
 *
 * @package    projectname
 * @subpackage form
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEmailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'email_type'   => new sfWidgetFormChoice(array('choices' => array('incoming' => 'incoming', 'outgoing' => 'outgoing'))),
      'inmate_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Inmate'), 'add_empty' => false)),
      'contact_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Contact'), 'add_empty' => true)),
      'scanned'      => new sfWidgetFormInputCheckbox(),
      'date_scanned' => new sfWidgetFormDateTime(),
      'subject'      => new sfWidgetFormInputText(),
      'message'      => new sfWidgetFormTextarea(),
      'sufficient'   => new sfWidgetFormInputCheckbox(),
      'points'       => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email_type'   => new sfValidatorChoice(array('choices' => array(0 => 'incoming', 1 => 'outgoing'), 'required' => false)),
      'inmate_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Inmate'))),
      'contact_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Contact'), 'required' => false)),
      'scanned'      => new sfValidatorBoolean(array('required' => false)),
      'date_scanned' => new sfValidatorDateTime(array('required' => false)),
      'subject'      => new sfValidatorString(array('max_length' => 128)),
      'message'      => new sfValidatorString(),
      'sufficient'   => new sfValidatorBoolean(array('required' => false)),
      'points'       => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('email[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Email';
  }

}
