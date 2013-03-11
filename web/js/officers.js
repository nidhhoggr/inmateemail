$(function() {

    $('.email_incoming').live('click', function() {
        var email_incoming_id = $(this).data('email-incoming-id');
        makeAjaxCall('/email_incoming/view',{id:email_incoming_id});
    });

    $('.email_outgoing').live('click', function() {
        var email_outgoing_id = $(this).data('email-outgoing-id');
        makeAjaxCall('/email_outgoing/view',{id:email_outgoing_id});
    });

    $('#email_outgoing_Email_contact_id').live('change', function() {

        var contact_id = $(this).val();
        $.ajax({
            type: 'POST',
            data: {id: contact_id},
            url: inmates_url + '/contacts/getContactEmail',
            success: function(msg){
                $('#email_outgoing_recipient_email').val(msg);
            }
        });
    });

    $('#link-incoming').live('click', function(e) {
        e.preventDefault(); 
        makeAjaxCall('/email_incoming/index',{});
    });

    $('#link-outgoing').live('click', function(e) {
        e.preventDefault();
        makeAjaxCall('/email_outgoing/index',{});
    });
});

makeAjaxCall = function(route,data) {

    $.ajax({
        type: 'POST',
        data: data,
        url: officers_url + route,
        success: function(msg){
            $('#officer-content').html(msg);
        }
    });
}
