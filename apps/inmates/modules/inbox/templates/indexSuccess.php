<h1>Inbox</h1>
<a id="compose-message" href="#">Compose Message</a>
<table class="inmate-table">
  <thead>
    <tr>
      <th></th>
      <th>From</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody class="messages">
    <?php foreach ($email_incomings as $email_incoming): ?>
    <tr class="email_incoming" data-email-incoming-id="<?=$email_incoming->getId()?>">
      <td class="<?=($email_incoming->getInmateViewed())?'viewed':'not-viewed';?>"></td>
      <td><?php echo $email_incoming->getSender() ?></td>
      <td><?php echo $email_incoming->getEmail()->getWhenCreated() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
