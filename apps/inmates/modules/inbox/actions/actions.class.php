<?php

/**
 * inbox actions.
 *
 * @package    projectname
 * @subpackage inbox
 * @author     Joseph Persie
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inboxActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->email_incomings = Doctrine_Query::create()
      ->from('EmailIncoming ei, ei.Email e')
      ->orderBy('e.created_at DESC')
      ->execute();

  }

  public function executeView(sfWebRequest $request)
  {

    $email_incoming = EmailIncoming::getAuthorizedEmailById($request->getParameter('id'));

    $this->forward404Unless($email_incoming, sprintf('Object email_incoming does not exist (%s).', $request->getParameter('id')));


    if(!$email_incoming->getInmateViewed()) {
        //set as viewed
        $email_incoming->setInmateViewed(true);
        $email_incoming->setDateInmateViewed(date("Y-m-d H:i:s"));
        $email_incoming->save(); 
    }

    $this->email = $email_incoming;
    $this->setTemplate('view');
  }
}
