<div id="viewing-email">
<h1>Viewing Outgoing Email</h1>
From:
<div id="sender">
<?= $email->getInmate(); ?> At <?= $email->getEmail()->getWhenCreated(); ?>
</div>
To:
<div id="recipient">
<?= $email->getRecipient(); ?>
</div>
Subject:
<div id="subject">
<?=$email->getEmail()->getSubject()?>
</div>
Message:
<div id="message">
<?=$email->getEmail()->getMessage()?>
</div>
<a id="back-outbox" href="#">Back to Outbox</a>
</div>
