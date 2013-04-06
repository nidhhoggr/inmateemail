<h1>Outbox</h1>
<a id="compose-message" href="#">Compose Message</a>

<table class="inmate-table">
  <thead>
    <tr>
      <th></th>
      <th>Recipient</th>
      <th>Subject</th>
      <th>Date</th>
      <th></th>
    </tr>
  </thead>
  <tbody class="messages">
    <?php foreach ($email_outgoings as $email_outgoing): ?>
    <tr class="email_outgoing" data-email-outgoing-id="<?=$email_outgoing->getId()?>">
      <td class="<?=($email_outgoing->getSent() && $email_outgoing->getSufficient())?'sent':'not-sent';?>"></td>
      <td><?php echo $email_outgoing->getRecipient() ?></td>
      <td><?php echo $email_outgoing->getEmail()->getSubject() ?></td>
      <td><?php echo $email_outgoing->getEmail()->getWhenCreated() ?></td>
      <td <?=(!$email_outgoing->getSent())?'id="delete-queued-email"':'';?>></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
