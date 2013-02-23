<h1>Contacts List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Email address</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Phone number</th>
      <th>Is approved</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contacts as $contact): ?>
    <tr>
      <td><a href="<?php echo url_for('contacts_test/edit?id='.$contact->getId()) ?>"><?php echo $contact->getId() ?></a></td>
      <td><?php echo $contact->getEmailAddress() ?></td>
      <td><?php echo $contact->getFirstName() ?></td>
      <td><?php echo $contact->getLastName() ?></td>
      <td><?php echo $contact->getPhoneNumber() ?></td>
      <td><?php echo $contact->getIsApproved() ?></td>
      <td><?php echo $contact->getCreatedAt() ?></td>
      <td><?php echo $contact->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('contacts_test/new') ?>">New</a>
