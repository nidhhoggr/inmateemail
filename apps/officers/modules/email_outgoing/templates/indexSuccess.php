<h1>Outgoings Emails</h1>

<table class="inmate-table">
  <thead>
    <tr>
      <th>Subject</th>
      <th>Inmate</th>
      <th>Points</th>
      <th>Sufficient</th>
      <th>Sent</th>
    </tr>
  </thead>
  <tbody class="messages">
    <?php foreach ($email_outgoings as $email_outgoing): ?>
    <tr class="email_outgoing" data-email-outgoing-id="<?=$email_outgoing->getId()?>">
      <td><?php echo $email_outgoing->getEmail() ?></td>
      <td><?php echo $email_outgoing->getInmate() ?></td>
      <td><?php echo $email_outgoing->getEmail()->getPoints()?></td>
      <td><div id="bool_<?=($email_outgoing->getSufficient())?'true':'false'; ?>"></div></td>
      <td><div id="bool_<?=($email_outgoing->getSent())?'true':'false'; ?>"></div></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
