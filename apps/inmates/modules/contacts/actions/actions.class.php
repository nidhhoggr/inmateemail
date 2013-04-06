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
    $this->contacts = Doctrine_Query::create()
    ->from('Contact c, c.InmateContact ic')
    ->where('ic.inmate_id = ?',InmateTable::loggedIn()->getId())
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

    $contact = $request->getParameter('contact');

    $fetch_email = ContactTable::getByEmailAddress($contact['email_address']);

    if($fetch_email) {

        //if($fetch_email->myUser::getLoggedIn()
        //is this association of the same user?
        if(count($fetch_email['InmateContact'])) {

            if($fetch_email['InmateContact'][0]['inmate_id'] == InmateTable::loggedIn()->getId())
                $this->redirect('contacts/index');
        }

        if($inmate = InmateTable::loggedIn()) {

            $ic = new InmateContact;

            $ic->inmate_id = $inmate->id;
            $ic->contact_id = $fetch_email['id'];
            $ic->save();
        }

        //otherwise lets create it
        $this->redirect('contacts/index');
    }
    //otherwise process the form
    else {

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

        if ($form->isValid()) {

            $contact = $form->save();

            if($inmate = InmateTable::loggedIn()) {

                $ic = new InmateContact;

                $ic->inmate_id = $inmate->id;
                $ic->contact_id = $contact->id; 
                $ic->save();
            }

            $this->redirect('contacts/index');
        }
    }
  }
}
