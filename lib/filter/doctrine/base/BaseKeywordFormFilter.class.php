<?php

/**
 * Keyword filter form base class.
 *
 * @package    projectname
 * @subpackage filter
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseKeywordFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'flag_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Flag'), 'add_empty' => true)),
      'name'        => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'weight'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'flag_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Flag'), 'column' => 'id')),
      'name'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'weight'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('keyword_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Keyword';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'flag_id'     => 'ForeignKey',
      'name'        => 'Text',
      'description' => 'Text',
      'weight'      => 'Number',
    );
  }
}
