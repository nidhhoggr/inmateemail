<?php
//require_once(dirname(__FILE__) . '/../lib/vendor/PHPMailer/class.phpmailer.php');
//send grid smtp mailer
require_once(dirname(__FILE__) . '/../../lib/vendor/sendgrid-php/SendGrid_loader.php');

class Mailer {

    public function __construct() {

        $this->sendgrid = new SendGrid('inmateemail','a1genda666');
    }

    public function notifyNonexistentInmate(Mail $mail) {

        $email = new SendGrid\Mail();

        $email->addTo($mail->fromAddress)
            ->setFrom('noreply@emailforinmates.com')
            ->setSubject('Inmate Not Found')
            ->setHtml('The inmate email number you specified \''.$mail->subject.'\' does not exsist.<br />Please provide the inmates inmate number as the subject of the email.');

        $this->sendgrid->web->send($email);
    }

    public function notifyInmateInsufficieny(Inmate $inmate, $sender_email) {

        $email = new SendGrid\Mail();

        $email->addTo($sender_email)
            ->setFrom('noreply@emailforinmates.com')
            ->setSubject('Insufficient Funds')
            ->setHtml('The inmate you sent an email to \''.$inmate.'\' does not have sufficient funds to view the email.<br />Please replenish the inmates account to allow the inmate to view your email.');

        $this->sendgrid->web->send($email);
    }
}
