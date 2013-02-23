<h1>Contacts</h1>

<a id="create-contact" href="#">Create Contact</a>
<table class="inmate-table">
  <thead>
    <tr>
      <th>Email address</th>
      <th>Name</th>
      <th>Phone number</th>
      <th>Approved</th>
    </tr>
  </thead>
  <tbody class="contacts">
    <?php foreach ($contacts as $contact): ?>
    <tr class="<?=($contact->getIsApproved())?'approved':'unapproved'?>">
      <td><?php echo $contact->getEmailAddress() ?></td>
      <td><?php echo $contact->getFirstName() . ' ' . $contact->getLastName() ?></td>
      <td><?php echo $contact->getPhoneNumber() ?></td>
      <td><?php echo ($contact->getIsApproved())?'yes':'no'; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
