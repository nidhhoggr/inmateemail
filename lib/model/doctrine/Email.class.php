<?php

/**
 * Email
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    projectname
 * @subpackage model
 * @author     Joseph Persie
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Email extends BaseEmail
{

    public function getWhenCreated($format = 'M d, Y h:i a') {

        return $this->getDateTimeObject('created_at')->format($format);
    }

    public static function getByScan($scanned) {

        return Doctrine_Query::create() 
        ->from('Email e')
        ->where('e.approved = ?',$scanned)
        ->andWhere('e.disapproved = ?',$scanned)
        ->execute();
    }

    public static function countUnscanned() {

        $ei = new EmailIncoming;
        $eo = new EmailOutgoing;

        return $ei->getByScanAndCount(false)->count() +
               $eo->getByScanAndCount(false)->count();
    }

    public static function cleanMessage($message) {

        $message = preg_replace('/( )+/', ' ', $message);
        $message = strtolower($message);
        $message = strip_tags($message);

        return $message;
    }

    public static function getNextUnscannedEmail($direction) {

        $joinModel = 'Email' . ucfirst($direction);

        $email = Doctrine_Query::create()
        ->select('jm.id')    
        ->from($joinModel . ' jm, jm.Email e')
        ->where('e.email_type = ?',$direction)
        ->andWhere('e.approved = ?',false)
        ->andWhere('e.disapproved = ?',false)
        ->fetchOne();

        return $email;
    }
}
