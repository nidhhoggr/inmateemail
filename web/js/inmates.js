$(function() {

    $('.email_incoming').live('click', function() {
        var email_incoming_id = $(this).data('email-incoming-id');
        makeAjaxCall('inbox/view',{id:email_incoming_id});
    });

    $('.email_outgoing').live('click', function() {
        var email_outgoing_id = $(this).data('email-outgoing-id');
        makeAjaxCall('outbox/view',{id:email_outgoing_id});
    });

    $('#compose-message').live('click', function(e) {
        e.preventDefault();
        makeAjaxCall('outbox/new',{});
    });

    $('#send-message').live('click',function(e) {
        e.preventDefault();
        var form_data = $('#form-compose-message').serialize();
        makeAjaxCall('outbox/create',form_data);
    });

    $('#save-contact').live('click',function(e) {
        e.preventDefault();
        var form_data = $('#form-create-contact').serialize();
        makeAjaxCall('contacts/create',form_data);
    });

    $('#email_outgoing_Email_contact_id').live('change', function() {

        var contact_id = $(this).val();
        $.ajax({
            type: 'POST',
            data: {id: contact_id},
            url: inmates_url + 'contacts/getContactEmail',
            success: function(msg){
                $('#email_outgoing_recipient_email').val(msg);
            }
        });
    });

    $('#back-inbox').live('click', function(e) {
        e.preventDefault(); 
        makeAjaxCall('inbox/index',{});
    });

    $('#back-outbox').live('click', function(e) {
        e.preventDefault();
        makeAjaxCall('outbox/index',{});
    });

    $('#create-contact').live('click', function(e) {
        e.preventDefault();
        makeAjaxCall('contacts/new',{});
    });
    $('#back-contacts').live('click', function(e) {
        e.preventDefault();
        makeAjaxCall('contacts/index',{});
    });
});

makeAjaxCall = function(route,data) {

    $.ajax({
        type: 'POST',
        data: data,
        url: inmates_url + route,
        success: function(msg){
            $('#inmate-content').html(msg);
        }
    });
}
