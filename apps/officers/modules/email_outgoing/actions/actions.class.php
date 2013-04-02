<?php

/**
 * email_outgoing actions.
 *
 * @package    projectname
 * @subpackage email_outgoing
 * @author     Joseph Persie
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class email_outgoingActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $eo = new EmailOutgoing();
    $ots_limit = Config::getVal('officer_to_scan_limit');
    $this->email_outgoings = $eo->getByScanAndCount(false,$ots_limit);
  }


  public function executeView(sfWebRequest $request)
  {
    $email_outgoing = EmailOutgoing::getById($request->getParameter('id'));

    $this->forward404Unless($email_outgoing, sprintf('Object email_outgoing does not exist (%s).', $request->getParameter('id')));
    $this->email = $email_outgoing;
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
