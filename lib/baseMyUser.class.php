<?php

class baseMyUser extends sfGuardSecurityUser {

    public function getAuthRedirectUrl() {

        $url = false;

        $userType = $this->getUserType(); 

        switch($userType) {
            case 'inmate':
                $url = sfContext::getInstance()->getConfiguration()->generateUrl('inmates','homepage',array());
            break;
            case 'officer':
                $url = sfContext::getInstance()->getConfiguration()->generateUrl('officers','homepage',array());
            break;
            case 'superadmin':
                $url = sfContext::getInstance()->getConfiguration()->generateUrl('backend','homepage',array());
            break;
        }

        return $url;
    }

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

            if($c) $ut = 'officer';
        }
        else {
            $ut = 'inmate';
        }

        if(empty($ut))
            $ut = ($this->isSuperAdmin())?'superadmin':false;
          
        return $ut;
    }

    public function isInmate() {

        if($this->getUserType() == 'inmate') {
            return Doctrine_Core::getTable('Inmate')->getByUserId($this->getId());
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
