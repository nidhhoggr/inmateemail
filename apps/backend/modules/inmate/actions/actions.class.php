<?php

require_once dirname(__FILE__).'/../lib/inmateGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/inmateGeneratorHelper.class.php';

/**
 * inmate actions.
 *
 * @package    projectname
 * @subpackage inmate
 * @author     Joseph Persie
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inmateActions extends autoInmateActions
{

    private function handleAuthRedirect() {
        $url = $this->getUser()->getAuthRedirectUrl();
        if(!strstr($url,'backend'))
        $this->redirect($url);
    }


    public function executeIndex(sfWebRequest $request) {

         $this->handleAuthRedirect();


         parent::executeIndex($request);

    }
}
