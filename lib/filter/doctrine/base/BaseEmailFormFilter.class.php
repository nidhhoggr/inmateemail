<?php

/**
 * Email filter form base class.
 *
 * @package    projectname
 * @subpackage filter
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmailFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email_type'   => new sfWidgetFormChoice(array('choices' => array('' => '', 'incoming' => 'incoming', 'outgoing' => 'outgoing'))),
      'inmate_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Inmate'), 'add_empty' => true)),
      'contact_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Contact'), 'add_empty' => true)),
      'scanned'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'date_scanned' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'subject'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sufficient'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'email_type'   => new sfValidatorChoice(array('required' => false, 'choices' => array('incoming' => 'incoming', 'outgoing' => 'outgoing'))),
      'inmate_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Inmate'), 'column' => 'id')),
      'contact_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Contact'), 'column' => 'id')),
      'scanned'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'date_scanned' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'subject'      => new sfValidatorPass(array('required' => false)),
      'message'      => new sfValidatorPass(array('required' => false)),
      'sufficient'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('email_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Email';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'email_type'   => 'Enum',
      'inmate_id'    => 'ForeignKey',
      'contact_id'   => 'ForeignKey',
      'scanned'      => 'Boolean',
      'date_scanned' => 'Date',
      'subject'      => 'Text',
      'message'      => 'Text',
      'sufficient'   => 'Boolean',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
