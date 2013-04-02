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

// Display all e-mail
foreach($mailbox->searchMailBox('UNSEEN') as $mailId) {
	$mail = $mailbox->getMail($mailId);
	// $mailbox->setMailAsSeen($mail->mId);
	// $mailbox->deleteMail($mail->mId);
        $mailbox->markMessageAsUnread($mail->mId);
        var_dump($mail->subject);
}
