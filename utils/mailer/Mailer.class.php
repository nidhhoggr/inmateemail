<?php
//require_once(dirname(__FILE__) . '/../lib/vendor/PHPMailer/class.phpmailer.php');
//send grid smtp mailer
require_once(dirname(__FILE__) . '/../../lib/vendor/sendgrid-php/SendGrid_loader.php');

class Mailer {

    public function __construct() {

        $sendgrid_username = Config::getVal('sendgrid_username');
        $sendgrid_password = Config::getVal('sendgrid_password');
        $this->noreply_email = Config::getVal('noreply_email');
        $this->mailbox_email = Config::getVal('mailbox_email');
        $this->sendgrid = new SendGrid($sendgrid_username,$sendgrid_password);
    }

    public function notifyNonexistentInmate($mail) {

        $email = new SendGrid\Mail();

        $email->addTo($mail->fromAddress)
            ->setFrom($this->noreply_email)
            ->setSubject('Inmate Not Found')
            ->setHtml('The inmate email number you specified \''.$mail->subject.'\' does not exsist.<br />Please provide the inmates inmate number as the subject of the email.');

        $this->sendgrid->web->send($email);
    }

    public function notifyInmateInsufficiency(Inmate $inmate, $sender_email,$direction) {

        $email = new SendGrid\Mail();

        if($direction == "incoming") {

            $email->addTo($sender_email)
            ->setFrom($this->noreply_email)
            ->setSubject('Insufficient Funds')
            ->setHtml('The inmate you sent an email to \''.$inmate->getFullName().'\' does not have sufficient funds to view the email.<br />Please replenish the inmates account to allow the inmate to view your email.');
            //provide a link to the ecommerce side
        }
        else if($direction == "outgoing") {

            $email->addTo($sender_email)
            ->setFrom($this->noreply_email)
            ->setSubject($inmate->getFullName() . ' is trying to cantact you')
            ->setHtml('An inmate by the name of \''.$inmate->getFullName().'\' does not have sufficient funds to send an email and is trying to contact you.<br />Please replenish the inmates account to allow the inmate to send emails to you.');
        }

        $this->sendgrid->web->send($email);
    }

    public function sendByInmate(Inmate $inmate, EmailOutgoing $email) {
        $mail = new SendGrid\Mail();

        $message = 'The inmate by the name of \''.$inmate->getFullName().'\' sent you the following message entitled '.$email->getEmail()->getSubject().'.<br /></br /><!--email_starts_here-->'.Email::cleanMessage($email->getEmail()->getMessage()).'<!--email_ends_here--><br /><br /><hr /><br /><br />In order to respond to the inmate you must provide the following inmate email number as the subject of the email: ' . $inmate->getEmailNumber() . '<br /><br />' . 'Response Link: <a href="mailto:mailbox@emailforinmates.com?Subject='.$inmate->getEmailNumber().'" target="_blank">Mailto Link</a>';

        $mail->addTo($email->getRecipientEmail())
            ->setFrom($this->mailbox_email)
            ->setSubject('Message From '.$inmate->getFullName() .': '.$email->getEmail()->getSubject())
            ->setHtml($message);

        $this->sendgrid->web->send($mail);
    }
}
