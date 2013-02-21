<?php

/**
 * EmailKeyword filter form base class.
 *
 * @package    projectname
 * @subpackage filter
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmailKeywordFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Email'), 'add_empty' => true)),
      'keyword_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Keyword'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'email_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Email'), 'column' => 'id')),
      'keyword_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Keyword'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('email_keyword_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailKeyword';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'email_id'   => 'ForeignKey',
      'keyword_id' => 'ForeignKey',
    );
  }
}
