<?php

/**
 * AuditLogger form.
 *
 * @package    primal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AuditLoggerForm extends BaseAuditLoggerForm
{
  public function configure()
  {

      $params = unserialize($this->getObject()->getParams());

      $all = $this->buildWidgets($params[$this->getObject()->getModule()]);

      $this->unsetTimestampable();

      unset($this['params']);

  }

  private function buildWidgets($params,$array_name = null) {

      $all = array();

      foreach($params as $name=>$value) {

        if(is_array($value)) {
            $all[] = $this->buildWidgets($params[$name],$name);
        }
        else {
            if(!empty($array_name)) {
                if(is_numeric($name))
                    $name = $array_name . '_' . ++$name;
                else
                    $name = $array_name . '_' . $name;
            }

            $all['widget'][$name] = $this->setWidget($name, new sfWidgetFormInputText());

            $this->setDefault($name,$value);
            $all['validator'][$name] = $this->setValidator($name, new sfValidatorString(array('max_length' => 96, 'required' => false)));
        }

      }

      return $all;
  }

}
