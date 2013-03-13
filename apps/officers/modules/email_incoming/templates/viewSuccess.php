<div id="viewing-email">
<h1>Viewing Incoming Email</h1>
From:
<div id="sender">
<?= $email->getSender(); ?> At <?= $email->getEmail()->getWhenCreated(); ?>
</div>
To:
<div id="sender">
<?= $email->getInmate(); ?>
</div>
Subject:
<div id="subject">
<?=$email->getEmail()->getSubject()?>
</div>
Message:
<div id="message">
<?=$email->getEmail()->getRaw('message')?>
</div>
<a id="link-incoming" href="#">Back to Incoming Emails</a>
</div>
