<div id="viewing-email">
<h1>Viewing Email</h1>
To:
<div id="sender">
<?= $email->getRecipient(); ?> At <?= $email->getEmail()->getWhenCreated(); ?>
</div>
Subject:
<div id="subject">
<?=$email->getEmail()->getSubject()?>
</div>
Message:
<div id="message">
<?=Email::cleanMessage($email->getEmail()->getRaw('message'))?>
</div>
<a id="back-outbox" href="#">Back to Outbox</a>
</div>
