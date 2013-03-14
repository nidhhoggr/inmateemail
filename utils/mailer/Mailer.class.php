<?php
//require_once(dirname(__FILE__) . '/../lib/vendor/PHPMailer/class.phpmailer.php');
//send grid smtp mailer
require_once(dirname(__FILE__) . '/../../lib/vendor/sendgrid-php/SendGrid_loader.php');

class Mailer {

    public function __construct() {

        $this->sendgrid = new SendGrid('inmateemail','a1genda666');
    }

    public function notifyNonexistentInmate($mail) {

        $email = new SendGrid\Mail();

        $email->addTo($mail->fromAddress)
            ->setFrom('noreply@emailforinmates.com')
            ->setSubject('Inmate Not Found')
            ->setHtml('The inmate email number you specified \''.$mail->subject.'\' does not exsist.<br />Please provide the inmates inmate number as the subject of the email.');

        $this->sendgrid->web->send($email);
    }

    public function notifyInmateInsufficiency(Inmate $inmate, $sender_email,$direction) {

        $email = new SendGrid\Mail();

        if($direction == "incoming") {

            $email->addTo($sender_email)
            ->setFrom('noreply@emailforinmates.com')
            ->setSubject('Insufficient Funds')
            ->setHtml('The inmate you sent an email to \''.$inmate->getFullName().'\' does not have sufficient funds to view the email.<br />Please replenish the inmates account to allow the inmate to view your email.');
        }
        else if($direction == "outgoing") {

            $email->addTo($sender_email)
            ->setFrom('noreply@emailforinmates.com')
            ->setSubject($inmate->getFullName() . ' is trying to cantact you')
            ->setHtml('An inmate by the name of \''.$inmate->getFullName().'\' does not have sufficient funds to send an email and is trying to contact you.<br />Please replenish the inmates account to allow the inmate to send emails to you.');
        }

        $this->sendgrid->web->send($email);
    }

    public function sendByInmate(Inmate $inmate, EmailOutgoing $email) {
        $mail = new SendGrid\Mail();

        $mail->addTo($email->getRecipientEmail())
            ->setFrom('noreply@emailforinmates.com')
            ->setSubject('Message From '.$inmate->getFullName() .': '.$email->getEmail()->getSubject())
            ->setHtml('The inmate by the name of \''.$inmate->getFullName().'\' sent you the following message entitled '.$email->getEmail()->getSubject().'.<br /></br />'.$email->getEmail()->getMessage());

        $this->sendgrid->web->send($mail);
    }
}
