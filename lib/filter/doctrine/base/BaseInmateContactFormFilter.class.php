<?php

/**
 * InmateContact filter form base class.
 *
 * @package    projectname
 * @subpackage filter
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInmateContactFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'inmate_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Inmate'), 'add_empty' => true)),
      'contact_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Contact'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'inmate_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Inmate'), 'column' => 'id')),
      'contact_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Contact'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('inmate_contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InmateContact';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'inmate_id'  => 'ForeignKey',
      'contact_id' => 'ForeignKey',
    );
  }
}
