<?php

/**
 * Configuration filter form base class.
 *
 * @package    projectname
 * @subpackage filter
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseConfigurationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'        => new sfWidgetFormFilterInput(),
      'description'  => new sfWidgetFormFilterInput(),
      'config_key'   => new sfWidgetFormFilterInput(),
      'config_value' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'        => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'config_key'   => new sfValidatorPass(array('required' => false)),
      'config_value' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('configuration_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Configuration';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'title'        => 'Text',
      'description'  => 'Text',
      'config_key'   => 'Text',
      'config_value' => 'Text',
    );
  }
}
