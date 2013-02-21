<?php

/**
 * Keyword form base class.
 *
 * @method Keyword getObject() Returns the current form's model object
 *
 * @package    projectname
 * @subpackage form
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseKeywordForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'flag_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Flag'), 'add_empty' => false)),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'weight'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'flag_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Flag'))),
      'name'        => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'weight'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('keyword[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Keyword';
  }

}
