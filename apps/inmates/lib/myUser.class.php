<?php

class myUser extends sfGuardSecurityUser {

    public function getUserType() {

        if(!$this->isAuthenticated()) return false;

        $e = Doctrine_Query::create()
             ->from('Inmate i')
             ->where('i.user_id = ?', $this->getId())
             ->fetchOne();

        if(!$e) {
            $c = Doctrine_Query::create()
                 ->from('Officer o')
                 ->where('o.user_id = ?', $this->getId())
                 ->fetchOne();

            if($c) return 'officer';
        }
        else {
            return 'inmate';
        }

        return false;
    }

    public function isInmate() {

        if($this->getUserType() == 'inmate') {
            return Doctrine_Core::getTable('Inmate')->getByUserId($this->getId());
            //return $this->getStaff(); 
        }
        return false;
    }

    public function isOfficer() {
        if($this->getUserType() == 'officer') {
            return Doctrine_Core::getTable('Officer')->getByUserId($this->getId());

        }
        return false;
    }

    public static function getLoggedIn() {
        return sfContext::getInstance()->getUser();
    }
}
