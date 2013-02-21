<?php

/**
 * EmailIncoming filter form base class.
 *
 * @package    projectname
 * @subpackage filter
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmailIncomingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Email'), 'add_empty' => true)),
      'sender_email'       => new sfWidgetFormFilterInput(),
      'inmate_viewed'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'date_inmate_viewed' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'email_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Email'), 'column' => 'id')),
      'sender_email'       => new sfValidatorPass(array('required' => false)),
      'inmate_viewed'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'date_inmate_viewed' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('email_incoming_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailIncoming';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'email_id'           => 'ForeignKey',
      'sender_email'       => 'Text',
      'inmate_viewed'      => 'Boolean',
      'date_inmate_viewed' => 'Date',
    );
  }
}
