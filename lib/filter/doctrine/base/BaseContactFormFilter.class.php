<?php

/**
 * Contact filter form base class.
 *
 * @package    projectname
 * @subpackage filter
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContactFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'first_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone_number'  => new sfWidgetFormFilterInput(),
      'is_approved'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'inmate_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Inmate')),
    ));

    $this->setValidators(array(
      'email_address' => new sfValidatorPass(array('required' => false)),
      'first_name'    => new sfValidatorPass(array('required' => false)),
      'last_name'     => new sfValidatorPass(array('required' => false)),
      'phone_number'  => new sfValidatorPass(array('required' => false)),
      'is_approved'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'inmate_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Inmate', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addInmateListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.InmateContact InmateContact')
      ->andWhereIn('InmateContact.contact_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Contact';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'email_address' => 'Text',
      'first_name'    => 'Text',
      'last_name'     => 'Text',
      'phone_number'  => 'Text',
      'is_approved'   => 'Boolean',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'inmate_list'   => 'ManyKey',
    );
  }
}
