<div id="viewing-email">
<h1>Viewing Email</h1>
From:
<div id="sender">
<?= $email->getSender(); ?> At <?= $email->getEmail()->getWhenCreated(); ?>
</div>
Subject:
<div id="subject">
<?=$email->getEmail()->getSubject()?>
</div>
Message:
<div id="message">
<?=Email::cleanMessage($email->getEmail()->getRaw('message'))?>
</div>
<a id="back-inbox" href="#">Back to Inbox</a>
</div>
