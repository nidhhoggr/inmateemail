$(function() {

    $('.email_incoming').live('click', function() {
        var email_incoming_id = $(this).data('email-incoming-id');
        viewIncomingByEmailId(email_incoming_id);
    });

    $('.email_outgoing').live('click', function() {
        var email_outgoing_id = $(this).data('email-outgoing-id');
        viewOutgoingByEmailId(email_outgoing_id);
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

    $('#approve_outgoing_email').live('click',function() {

        var email_id = $(this).data('email-id');

        makeAjaxCallWithCallback('/email_outgoing/ajaxApproveEmail',{email_id: email_id},function(msg) {
            msg = $.parseJSON(msg);
            viewOutgoingByEmailId(msg.email_id);
        });
    });

    $('#approve_incoming_email').live('click',function() {

        var email_id = $(this).data('email-id');

        makeAjaxCallWithCallback('/email_incoming/ajaxApproveEmail',{email_id: email_id},function(msg) {
            msg = $.parseJSON(msg);
            viewIncomingByEmailId(msg.email_id);
        });
    });
});

var viewIncomingByEmailId = function(email_id) {
    makeAjaxCall('/email_incoming/view',{id:email_id});
}

var viewOutgoingByEmailId = function(email_id) {
    makeAjaxCall('/email_outgoing/view',{id:email_id});
}


var makeAjaxCall = function(route,data) {

    $.ajax({
        type: 'POST',
        data: data,
        url: officers_url + route,
        success: function(msg){
            $('#officer-content').html(msg);
        }
    });
}

makeAjaxCallWithCallback = function(route,data,callback) {
    $.ajax({
        type: 'POST',
        data: data,
        url: officers_url + route,
        success: function(msg){
            callback(msg);
        }
    });
}