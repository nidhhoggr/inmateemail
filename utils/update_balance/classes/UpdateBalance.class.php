<?php
class UpdateBalance {

  public function reenqueue($inmate_id) {

      if(is_null($inmate_id)) echo 'nada';
          //$this->_reenqueueEmailsForAllInmates();
      else
          $this->_reenqueueEmailsByInmateId($inmate_id);
  }

  public function updateInmateBalance($inmate_id,$bal) {

      $inmate = Doctrine_Core::getTable('Inmate')->find($inmate_id);

      if($inmate) {

          $inmate->setBalance($bal);
          $inmate->save();
      }
  }

  private function _reenqueueEmailsForAllInmates() {

      $res = EmailOutgoing::getReenqueableEmails();

      foreach($res as $re) {

          //get the inmates balance
          $inmate_bal = $re->getInmate()->getBalance();

          $outgoing_fee = Config::getVal('send_email_price');

          $after_outgoing_fee = $inmate_bal - $outgoing_fee;
          //does the inmate have a sufficient balance?
          if($after_outgoing_fee >= 0) {

              //now we can reenqueue the email

              //update the inmates balance
              $re->getInmate()->setBalance($inmate_bal - $outgoing_fee);

              $re->setSent(false);

              $re->getEmail()->setSufficient(true);

              $re->save();
          }
      }
  }

  private function _reenqueueEmailsByInmateId($inmate_id) {

      $res = EmailOutgoing::getReenqueueableEmailsByInmateId($inmate_id);

      $debug = false;

      foreach($res as $re) {

          //get the inmates balance
          $inmate_bal = $re->getInmate()->getBalance();

          $outgoing_fee = Config::getVal('send_email_price');

          $after_outgoing_fee = $inmate_bal - $outgoing_fee;
          //does the inmate have a sufficient balance?

          if($debug) {
              var_dump($re->getInmate()->getBalance());
              var_dump($after_outgoing_fee >= 0);

          } else if($after_outgoing_fee >= 0) {

              //now we can reenqueue the email

              //update the inmates balance
              $re->getInmate()->setBalance($inmate_bal - $outgoing_fee);

              $re->setSent(false);

              $re->getEmail()->setSufficient(true);

              $re->save();

          } else {

              break;
          }
      }
  }
}
