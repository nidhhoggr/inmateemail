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

  private function ajaxActionEmail($email_id,$action) {

      $email = Doctrine_Core::getTable('Email')->find($email_id);
      $email->$action = 1;
      $email->save();

      $email = Email::getNextUnscannedEmail('incoming');

      echo json_encode(array('email_id'=>$email->id));
      die();
  }

  public function executeAjaxApproveEmail(sfWebRequest $request) {
 
      $email_id = $request->getParameter('email_id'); 
      $this->ajaxActionEmail($email_id,'approved');
  }

  public function executeAjaxDisapproveEmail(sfWebRequest $request) {

      $email_id = $request->getParameter('email_id');
      $this->ajaxActionEmail($email_id,'disapproved');
  }

  public function executeAjaxCountUnscanned(sfWebRequest $request) {
      $count_unscanned = Email::countUnscanned();
      echo json_encode(compact('count_unscanned'));
      die();
  }
}
