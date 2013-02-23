<?php

/**
 * outbox actions.
 *
 * @package    projectname
 * @subpackage outbox
 * @author     Joseph Persie
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class outboxActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->email_outgoings = Doctrine_Query::create()
      ->from('EmailOutgoing eo, eo.Email e')
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
      $this->redirect('inbox/index');
    }
  }

  private function setProtectedValues(&$request) {

      $params = $request->getParameter('email_outgoing');
      $params['Email']['inmate_id'] = InmateTable::loggedIn()->getId();
      $params['Email']['email_type'] = 'outgoing';
      $request->setParameter('email_outgoing',$params);
  }
}
