<h1>Incoming Emails</h1>

<table class="inmate-table">
  <thead>
    <tr>
      <th>Subject</th>
      <th>Inmate</th>
      <th>Points</th>
      <th>Sufficient</th>
      <th>Opened</th>
    </tr>
  </thead>
  <tbody class="messages">
    <?php foreach ($email_incomings as $email_incoming): ?>
    <tr class="email_incoming" data-email-incoming-id="<?=$email_incoming->getId()?>">
      <td><?php echo $email_incoming->getEmail() ?></td>
      <td><?php echo $email_incoming->getInmate() ?></td>
      <td></td>
      <td><div id="bool_<?=($email_incoming->getSufficient())?'true':'false'; ?>"></div></td>
      <td><div id="bool_<?=($email_incoming->getInmateViewed())?'true':'false'; ?>"></div></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
