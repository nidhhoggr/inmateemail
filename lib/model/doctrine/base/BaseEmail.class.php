<?php

/**
 * BaseEmail
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property enum $email_type
 * @property integer $inmate_id
 * @property integer $contact_id
 * @property boolean $scanned
 * @property timestamp $date_scanned
 * @property string $subject
 * @property clob $message
 * @property Inmate $Inmate
 * @property Contact $Contact
 * @property Doctrine_Collection $EmailOutgoing
 * @property Doctrine_Collection $EmailIncoming
 * @property Doctrine_Collection $EmailKeyword
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method enum                getEmailType()     Returns the current record's "email_type" value
 * @method integer             getInmateId()      Returns the current record's "inmate_id" value
 * @method integer             getContactId()     Returns the current record's "contact_id" value
 * @method boolean             getScanned()       Returns the current record's "scanned" value
 * @method timestamp           getDateScanned()   Returns the current record's "date_scanned" value
 * @method string              getSubject()       Returns the current record's "subject" value
 * @method clob                getMessage()       Returns the current record's "message" value
 * @method Inmate              getInmate()        Returns the current record's "Inmate" value
 * @method Contact             getContact()       Returns the current record's "Contact" value
 * @method Doctrine_Collection getEmailOutgoing() Returns the current record's "EmailOutgoing" collection
 * @method Doctrine_Collection getEmailIncoming() Returns the current record's "EmailIncoming" collection
 * @method Doctrine_Collection getEmailKeyword()  Returns the current record's "EmailKeyword" collection
 * @method Email               setId()            Sets the current record's "id" value
 * @method Email               setEmailType()     Sets the current record's "email_type" value
 * @method Email               setInmateId()      Sets the current record's "inmate_id" value
 * @method Email               setContactId()     Sets the current record's "contact_id" value
 * @method Email               setScanned()       Sets the current record's "scanned" value
 * @method Email               setDateScanned()   Sets the current record's "date_scanned" value
 * @method Email               setSubject()       Sets the current record's "subject" value
 * @method Email               setMessage()       Sets the current record's "message" value
 * @method Email               setInmate()        Sets the current record's "Inmate" value
 * @method Email               setContact()       Sets the current record's "Contact" value
 * @method Email               setEmailOutgoing() Sets the current record's "EmailOutgoing" collection
 * @method Email               setEmailIncoming() Sets the current record's "EmailIncoming" collection
 * @method Email               setEmailKeyword()  Sets the current record's "EmailKeyword" collection
 * 
 * @package    projectname
 * @subpackage model
 * @author     Joseph Persie
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEmail extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('email');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('email_type', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'incoming',
              1 => 'outgoing',
             ),
             ));
        $this->hasColumn('inmate_id', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('contact_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('scanned', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('date_scanned', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('subject', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('message', 'clob', null, array(
             'type' => 'clob',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Inmate', array(
             'local' => 'inmate_id',
             'foreign' => 'id'));

        $this->hasOne('Contact', array(
             'local' => 'contact_id',
             'foreign' => 'id'));

        $this->hasMany('EmailOutgoing', array(
             'local' => 'id',
             'foreign' => 'email_id'));

        $this->hasMany('EmailIncoming', array(
             'local' => 'id',
             'foreign' => 'email_id'));

        $this->hasMany('EmailKeyword', array(
             'local' => 'id',
             'foreign' => 'email_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}