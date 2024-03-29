<?php

/**
 * Contact
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    projectname
 * @subpackage model
 * @author     Joseph Persie
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Contact extends BaseContact
{


    public static function findByEmailAddress($email_address) {

        return Doctrine_Query::create() 
        ->from('Contact c')
        ->where('c.email_address = ?',$email_address)
        ->fetchOne();
    }

    public function __toString() {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
}
