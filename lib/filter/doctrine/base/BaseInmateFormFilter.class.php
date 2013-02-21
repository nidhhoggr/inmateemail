<?php

/**
 * Inmate filter form base class.
 *
 * @package    projectname
 * @subpackage filter
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInmateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'email_number'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'jail_number'         => new sfWidgetFormFilterInput(),
      'balance'             => new sfWidgetFormFilterInput(),
      'contacts_approvable' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'emails_approvable'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'email_number'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'jail_number'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'balance'             => new sfValidatorPass(array('required' => false)),
      'contacts_approvable' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'emails_approvable'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('inmate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inmate';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'user_id'             => 'ForeignKey',
      'email_number'        => 'Number',
      'jail_number'         => 'Number',
      'balance'             => 'Text',
      'contacts_approvable' => 'Boolean',
      'emails_approvable'   => 'Boolean',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
