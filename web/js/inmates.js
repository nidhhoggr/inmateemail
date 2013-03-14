$(function() {

    $('.email_incoming').live('click', function() {
        var email_incoming_id = $(this).data('email-incoming-id');
        makeAjaxCall('/inbox/view',{id:email_incoming_id});
    });

    $('.email_outgoing').live('click', function() {
        var email_outgoing_id = $(this).data('email-outgoing-id');
        makeAjaxCall('/outbox/view',{id:email_outgoing_id});
    });

    $('#compose-message').live('click', function(e) {
        e.preventDefault();
        makeAjaxCall('/outbox/new',{});
    });

    $('#send-message').live('click',function(e) {
        e.preventDefault();
        var form_data = $('#form-compose-message').serialize();

        makeAjaxCallWithCallback('/outbox/create',form_data,function(msg) {
            updateBalance(); 
            $('#inmate-content').html(msg);
        });
    });

    $('#save-contact').live('click',function(e) {
        e.preventDefault();
        var form_data = $('#form-create-contact').serialize();
        makeAjaxCall('/contacts/create',form_data);
    });

    $('#email_outgoing_Email_contact_id').live('change', function() {

        var contact_id = $(this).val();
        makeAjaxCallWithCallback('/contacts/getContactEmail',{id: contact_id},function(msg) {
            $('#email_outgoing_recipient_email').val(msg);
        });
    });

    $('#back-inbox').live('click', function(e) {
        e.preventDefault(); 
        makeAjaxCall('/inbox/index',{});
    });

    $('#back-outbox').live('click', function(e) {
        e.preventDefault();
        makeAjaxCall('/outbox/index',{});
    });

    $('#create-contact').live('click', function(e) {
        e.preventDefault();
        makeAjaxCall('/contacts/new',{});
    });
    $('#back-contacts').live('click', function(e) {
        e.preventDefault();
        makeAjaxCall('/contacts/index',{});
    });

    setInterval(function() {
        console.log('updating balance');
        updateBalance();
    },5000);
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

makeAjaxCallWithCallback = function(route,data,callback) {
    $.ajax({
        type: 'POST',
        data: data,
        url: inmates_url + route,
        success: function(msg){
            callback(msg);
        }
    });
}

updateBalance = function() {

    makeAjaxCallWithCallback('/outbox/ajaxInmateBalance',{},function(msg) {
            msg = $.parseJSON(msg);
            $('#account_balance span').html('$'+msg.account_balance);
            $('#pending_charges span').html('$'+msg.pending_charges);
    });
}
