<?php

/**
 * email_incoming actions.
 *
 * @package    projectname
 * @subpackage email_incoming
 * @author     Joseph Persie
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class email_incomingActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $ei = new EmailIncoming();
    $ots_limit = Config::getVal('officer_to_scan_limit');
    $this->email_incomings = $ei->getByScanAndCount(false,$ots_limit);
  }

  public function executeView(sfWebRequest $request)
  {

    $email_incoming = EmailIncoming::getById($request->getParameter('id'));

    $this->forward404Unless($email_incoming, sprintf('Object email_incoming does not exist (%s).', $request->getParameter('id')));


    $this->email = $email_incoming;
    $this->setTemplate('view');
  }

  public function executeAjaxApproveEmail(sfWebRequest $request) {
 
      $email_id = $request->getParameter('email_id'); 
       
      $email = Doctrine_Core::getTable('Email')->find($email_id);
      $email->scanned = 1;
      $email->save();

      $email = Email::getNextUnscannedEmail('outgoing');
 
      echo json_encode(array('email_id'=>$email->id));
      die();
  }
}
