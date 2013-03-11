<?php

/**
 * EmailIncoming
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    projectname
 * @subpackage model
 * @author     Joseph Persie
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class EmailIncoming extends BaseEmailIncoming
{
    public function getSender() {

        $contact = trim($this->getEmail()->getContact()->__toString());

        if(!empty($contact)){
            $sender = $this->getEmail()->getContact();
        }
        else {
            $sender = $this->getSenderEmail();
        }

        return $sender;
    }

    public function getInmate() {

        return $this->getEmail()->getInmate();
    }

    public function getScanned() {
        return $this->getEmail()->getScanned();
    }

    public function getSufficient() {
        return $this->getEmail()->getSufficient();
    }

    public static function getById($id) {

        return Doctrine_Query::create()
        ->from('EmailIncoming ei, ei.Email e')
        ->where('ei.id = ?',$id)
        ->fetchOne();
    }

    public static function getAuthorizedEmailById($id) {

        return Doctrine_Query::create()
        ->from('EmailIncoming ei, ei.Email e')
        ->where('ei.id = ?',$id)
        ->andWhere('e.inmate_id = ?',InmateTable::loggedIn()->getId())
        ->fetchOne();
    }

    public function getByScanAndCount($scanned,$count) {

        return Doctrine_Query::create()
        ->from('EmailIncoming ei, ei.Email e')
        ->where('e.scanned = ?',$scanned)
        ->limit($count)
        ->execute();
    }
}
