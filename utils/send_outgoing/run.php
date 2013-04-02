<?php
//imap scanner
require_once(dirname(__FILE__) . '/../../lib/vendor/php-imap/ImapMailbox.php');
//get the mailer
require_once(dirname(__FILE__) . '/../mailer/Mailer.class.php');
//bootstrap symfony
require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'sandbox', true);
$instance = sfContext::createInstance($configuration);

$mh = new Mailer();

$queuedEmails = EmailOutgoing::getQueued();
$send_email_price = Config::getVal('receive_email_price');

foreach($queuedEmails as $email) {

    $inmate = Doctrine_Core::getTable('Inmate')->find($email->getEmail()->inmate_id);

    echo 'sending ' . $email->getEmail()->getSubject() . ' that is ';

    if($email->getEmail()->getSufficient()) {

        echo "sufficient\n";

        $mh->sendByInmate($inmate,$email); 
        $inmate->balance = $inmate->balance - $send_email_price;
        $inmate->save();
        $email->sent = true;
        $email->save(); 
    }
    else {

        echo "insufficient\n";

        $mh->notifyInmateInsufficiency($inmate,$email->getRecipientEmail(),'outgoing');
        $email->sent = true;
        $email->save(); 
    }

}
