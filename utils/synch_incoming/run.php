<?php
//imap scanner
require_once(dirname(__FILE__) . '/../../lib/vendor/php-imap/ImapMailbox.php');
//get the email scanner
require_once(dirname(__FILE__) . '/../scan_emails/ScanEmail.class.php');
//get the mailer
require_once(dirname(__FILE__) . '/../mailer/Mailer.class.php');
//bootstrap symfony
require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'sandbox', true);
$instance = sfContext::createInstance($configuration);

define('ATTACHMENTS_DIR', dirname(__FILE__) . '/attachments');

$username = Config::getVal('imap_username');
$password = Config::getVal('imap_password');
$connection = Config::getVal('imap_connection');

$mailbox = new ImapMailbox($connection, $username, $password, ATTACHMENTS_DIR, 'utf-8');

$mh = new Mailer();

// Display all e-mail
foreach($mailbox->searchMailBox('UNSEEN') as $mailId) {
	$mail = $mailbox->getMail($mailId);
	// $mailbox->setMailAsSeen($mail->mId);
	// $mailbox->deleteMail($mail->mId);

        //$mailbox->markMessageAsUnread($mail->mId);
        
        $inmate = Inmate::findByEmailNumber($mail->subject);
        $contact = Contact::findByEmailAddress($mail->fromAddress);


        if($inmate) {

            $currentBalance = Inmate::getCurrentBalance($inmate->id);
            $receive_email_price = Config::getVal('receive_email_price'); 

            $e = new Email();

            //does the inmate have sufficient funds?
            if((float)$currentBalance - $receive_email_price >= 0) {
                $e->sufficient = true;
                $inmate->balance = $inmate->balance - $receive_email_price;
                $inmate->save();
            }
            else { 
                $e->sufficient = false;
                //send an email to the sender notifying them of insufficient funds
                $mh->notifyInmateInsufficiency($inmate,$mail->fromAddress,'incoming');
            }

            $e->inmate_id = $inmate->id;
            $e->email_type = "incoming";
            $e->subject = strtolower($mail->subject);
            $e->message = strtolower($mail->textPlain);
            if($contact) $e->contact_id = $contact->id;
            $e->save();
 
            $ei = new EmailIncoming(); 
            $ei->email_id = $e->id;
            $ei->sender_email = $mail->fromAddress;
            $ei->date_sender_sent = $mail->date;
            $ei->sender_name = $mail->fromName;
            $ei->save();

            //scan and process the email for keywords
            $se = new ScanEmail();
            $se->scan($e);
        }
        //the inmate doesnt exists
        else {

            $mh->notifyNonexistentInmate($mail);
        }
}
