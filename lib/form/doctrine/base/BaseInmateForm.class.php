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
      'contact_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Contact')),
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
      'contact_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Contact', 'required' => false)),
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

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['contact_list']))
    {
      $this->setDefault('contact_list', $this->object->Contact->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveContactList($con);

    parent::doSave($con);
  }

  public function saveContactList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['contact_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Contact->getPrimaryKeys();
    $values = $this->getValue('contact_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Contact', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Contact', array_values($link));
    }
  }

}
