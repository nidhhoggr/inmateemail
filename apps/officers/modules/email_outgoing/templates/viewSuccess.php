<div class="email_approval">
<div id="approval_panel">
    <span id="approve_outgoing_email" class="approve_email" data-email-id="<?=$email->getEmail()->getId();?>">Approve</span>
    <span id="disapprove_outgoing_email" class="disapprove_email" data-email-id="<?=$email->getEmail()->getId();?>">Disapprove</span>
</div>
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
<?=$email->getEmail()->getRaw('message')?>
</div>
<a id="back-outbox" href="#">Back to Outbox</a>
</div>
</div>
<div class="legend">
<?php echo include_partial('email_incoming/legend'); ?>
</div>
