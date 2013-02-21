<?php

/**
 * EmailKeyword form base class.
 *
 * @method EmailKeyword getObject() Returns the current form's model object
 *
 * @package    projectname
 * @subpackage form
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEmailKeywordForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'email_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Email'), 'add_empty' => false)),
      'keyword_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Keyword'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Email'))),
      'keyword_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Keyword'))),
    ));

    $this->widgetSchema->setNameFormat('email_keyword[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailKeyword';
  }

}
