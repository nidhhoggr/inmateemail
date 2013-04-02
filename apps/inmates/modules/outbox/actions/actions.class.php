<?php

/**
 * outbox actions.
 *
 * @package    projectname
 * @subpackage outbox
 * @author     Joseph Persie
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
require_once(dirname(__FILE__) . '/../../../../../utils/scan_emails/ScanEmail.class.php');

class outboxActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->email_outgoings = Doctrine_Query::create()
      ->from('EmailOutgoing eo, eo.Email e')
      ->where('e.inmate_id = ?',InmateTable::loggedIn()->getId())
      ->orderBy('e.created_at DESC')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EmailOutgoingForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new EmailOutgoingForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeView(sfWebRequest $request)
  {
    $email_outgoing = EmailOutgoing::getAuthorizedEmailById($request->getParameter('id'));

    $this->forward404Unless($email_outgoing, sprintf('Object email_outgoing does not exist (%s).', $request->getParameter('id')));
    $this->email = $email_outgoing;
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $this->setProtectedValues($request); 
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $email_outgoing = $form->save();
      $se = new ScanEmail();
      $se->scan($email_outgoing->getEmail());
      $this->redirect('inbox/index');
    }
  }

  public function executeAjaxInmateBalance(sfWebRequest $request) {
      $account_balance = InmateTable::getCurrentBalance();
      $pending_charges = Inmate::calculatePendingChargesByLoggedIn();
      echo json_encode(compact('account_balance','pending_charges'));
      die();
  }

  private function setProtectedValues(&$request) {

      $isSufficient = InmateTable::hasSufficientFundsFor('send_email_price');
      $params = $request->getParameter('email_outgoing');
      $params['Email']['inmate_id'] = InmateTable::loggedIn()->getId();
      $params['Email']['email_type'] = 'outgoing';
      $params['Email']['sufficient'] = $isSufficient;
      $request->setParameter('email_outgoing',$params);
  }
}
