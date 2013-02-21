<?php

/**
 * Contact form.
 *
 * @package    projectname
 * @subpackage form
 * @author     Joseph Persie
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactForm extends BaseContactForm
{
  public function configure()
  {

      $this->setWidget('inmate_list', new sfWidgetFormDoctrineChoice(array(
          'multiple'=>true,
          'model'=>'Inmate',
          'renderer_class'=>'sfWidgetFormSelectDoubleList'
      )));
  }
}
