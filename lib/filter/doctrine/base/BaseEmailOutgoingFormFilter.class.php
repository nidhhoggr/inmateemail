<?php

/**
 * EmailOutgoing filter form base class.
 *
 * @package    projectname
 * @subpackage filter
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmailOutgoingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Email'), 'add_empty' => true)),
      'recipient_email' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sent'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cancelled'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'email_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Email'), 'column' => 'id')),
      'recipient_email' => new sfValidatorPass(array('required' => false)),
      'sent'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cancelled'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('email_outgoing_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailOutgoing';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'email_id'        => 'ForeignKey',
      'recipient_email' => 'Text',
      'sent'            => 'Boolean',
      'cancelled'       => 'Boolean',
    );
  }
}
