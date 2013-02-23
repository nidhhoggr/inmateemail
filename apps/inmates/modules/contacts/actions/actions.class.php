<?php

/**
 * contacts actions.
 *
 * @package    projectname
 * @subpackage contacts
 * @author     Joseph Persie
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->contacts = Doctrine_Core::getTable('Contact')
      ->createQuery('a')
      ->execute();
  }

  public function executeGetContactEmail(sfWebRequest $request) {

      $contact = Doctrine_Query::create()
          ->from('Contact c')
          ->where('c.id = ?',$request->getParameter('id'))
          ->fetchOne();

      if($contact) echo $contact->getEmailAddress();

      exit;
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ContactForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new ContactForm();

    $this->processForm($request, $this->form);
  
    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $contact = $form->save();

      $this->redirect('contacts/index');
    }
  }
}
