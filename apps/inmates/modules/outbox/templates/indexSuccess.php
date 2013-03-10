<h1>Outbox</h1>

<table class="inmate-table">
  <thead>
    <tr>
      <th>Recipient</th>
      <th>Subject</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody class="messages">
    <?php foreach ($email_outgoings as $email_outgoing): ?>
    <tr class="email_outgoing" data-email-outgoing-id="<?=$email_outgoing->getId()?>">
      <td class="<?=($email_outgoing->getSent())?'sent':'not-sent';?>"></td>
      <td><?php echo $email_outgoing->getRecipient() ?></td>
      <td><?php echo $email_outgoing->getEmail()->getSubject() ?></td>
      <td><?php echo $email_outgoing->getEmail()->getWhenCreated() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>