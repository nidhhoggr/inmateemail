<?php

/**
 * EmailIncoming form.
 *
 * @package    projectname
 * @subpackage form
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EmailIncomingForm extends BaseEmailIncomingForm
{
  public function configure()
  {

      $this->embedEmail();
  }
}
