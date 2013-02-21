<?php

/**
 * BaseEmailIncoming
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $email_id
 * @property string $sender_email
 * @property boolean $inmate_viewed
 * @property timestamp $date_inmate_viewed
 * @property Email $Email
 * 
 * @method integer       getId()                 Returns the current record's "id" value
 * @method integer       getEmailId()            Returns the current record's "email_id" value
 * @method string        getSenderEmail()        Returns the current record's "sender_email" value
 * @method boolean       getInmateViewed()       Returns the current record's "inmate_viewed" value
 * @method timestamp     getDateInmateViewed()   Returns the current record's "date_inmate_viewed" value
 * @method Email         getEmail()              Returns the current record's "Email" value
 * @method EmailIncoming setId()                 Sets the current record's "id" value
 * @method EmailIncoming setEmailId()            Sets the current record's "email_id" value
 * @method EmailIncoming setSenderEmail()        Sets the current record's "sender_email" value
 * @method EmailIncoming setInmateViewed()       Sets the current record's "inmate_viewed" value
 * @method EmailIncoming setDateInmateViewed()   Sets the current record's "date_inmate_viewed" value
 * @method EmailIncoming setEmail()              Sets the current record's "Email" value
 * 
 * @package    projectname
 * @subpackage model
 * @author     Joseph Persie
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEmailIncoming extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('email_incoming');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('email_id', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('sender_email', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('inmate_viewed', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('date_inmate_viewed', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Email', array(
             'local' => 'email_id',
             'foreign' => 'id'));
    }
}