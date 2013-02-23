<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="form-compose-message">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(true) ?>
          <?php echo $form['Email']->renderHiddenFields(true) ?>
          &nbsp;<a id="back-inbox" href="#">Back to Inbox</a>
          <button id="send-message">Send</button>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['recipient_email']->renderLabel() ?></th>
        <td>
          <?php echo $form['recipient_email']->renderError() ?>
          <?php echo $form['recipient_email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Email']['contact_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['Email']['contact_id']->renderError() ?>
          <?php echo $form['Email']['contact_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Email']['subject']->renderLabel() ?></th>
        <td>
          <?php echo $form['Email']['subject']->renderError() ?>
          <?php echo $form['Email']['subject'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Email']['message']->renderLabel() ?></th>
        <td>
          <?php echo $form['Email']['message']->renderError() ?>
          <?php echo $form['Email']['message'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
