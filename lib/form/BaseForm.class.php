<?php

/**
 * Base project form.
 * 
 * @package    primal
 * @subpackage form
 * @author     Your name here 
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony {

    public function getCurrentUser() {
        if(sfContext::hasInstance()) 
            return sfContext::getInstance()->getUser();
        else
            return false;
    }

    protected function unsetTimeStampable() {
        unset(
            $this['created_at'],
            $this['updated_at']
        );
    }

    protected function embedEmail($pk="email_id",$name="Email") {
        unset($this[$pk]);
        $formEmail = new EmailForm($this->getObject()->getEmail());
        $this->embedForm($name,$formEmail);
    }

    protected function embedUser($pk="user_id",$name="User") {
        unset($this[$pk]);
        $formUser = new SfGuardUserCustomForm($this->getObject()->getUser());

        $current_user = $this->getCurrentUser();

        if($current_user) {
            if(!$current_user->isSuperAdmin()) {
                unset($formUser['is_active']);
                unset($formUser['is_super_admin']);
            }
        }
       
        $this->embedForm($name,$formUser);
    }

    protected function embedInmateUser($pk="user_id",$name="User") {
        unset($this[$pk]);

        $formUser = new SfGuardUserCustomForm($this->getObject()->getUser());

        $unsetable = array(
            'is_active',
            'is_super_admin',
            'email_address', 
        );

        foreach($unsetable as $u) unset($formUser[$u]);

        $this->embedForm($name,$formUser);
    }
}
