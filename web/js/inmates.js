var current_interface, current_bal_info; 

$(function() {

    $('.email_incoming').live('click', function() {
        var email_incoming_id = $(this).data('email-incoming-id');
        current_interface = 'view-email';
        makeAjaxCall('/inbox/view',{id:email_incoming_id});
    });

    $('.email_outgoing td[id!=delete-queued-email]').live('click', function() {
        var email_outgoing_id = $(this).parent().data('email-outgoing-id');
        current_interface = 'view-email';
        makeAjaxCall('/outbox/view',{id:email_outgoing_id});
    });

    $('#compose-message').live('click', function(e) {
        e.preventDefault();
        current_interface = 'compose-message';
        makeAjaxCall('/outbox/new',{});
    });

    $('#send-message').live('click',function(e) {
        e.preventDefault();
        var form_data = $('#form-compose-message').serialize();

        makeAjaxCallWithCallback('/outbox/create',form_data,function(msg) {
            updateBalance(); 
            $('#inmate-content').html(msg);
            current_interface = 'inbox';
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
        current_interface = 'inbox';
        makeAjaxCall('/inbox/index',{});
    });

    $('#back-outbox').live('click', function(e) {
        e.preventDefault();
        current_interface = 'outbox';
        makeAjaxCall('/outbox/index',{});
    });

    $('#create-contact').live('click', function(e) {
        e.preventDefault();
        current_interface = 'create-contact';
        makeAjaxCall('/contacts/new',{});
    });
    $('#back-contacts').live('click', function(e) {
        e.preventDefault();
        current_interface = 'contacts';
        makeAjaxCall('/contacts/index',{});
    });

    $('#delete-queued-email').live('click', function(e) {

        var parent_row = $(this).parent();

        var id = parent_row.data('email-outgoing-id');

        makeAjaxCallWithCallback('/outbox/ajaxCancelOutgoing',{id:id}, function() {
 
            $(parent_row).fadeOut(500, function() { $().remove(parent_row); });
        });
    });

    //make updates
    setInterval(function() {
        updateBalance();
    },5000);
});

    updateBalance = function() {

        var account_balance = $('#account_balance span').text();
        var pending_charges = $('#pending_charges span').text();

        $.post('/outbox/ajaxInmateBalance',function(msg) {
            msg = $.parseJSON(msg);

            var act_bal = '$'+msg.account_balance;
            var pen_cha = '$'+msg.pending_charges;

            $('#account_balance span').html(act_bal);
            $('#pending_charges span').html(pen_cha);

            current_bal_info = {
                'bal':account_balance != act_bal,
                'pen':pending_charges != pen_cha
            }

        })
        .done(function() {
             updateTemplates();
        });
    }

updateTemplates = function() {

    if(current_bal_info.bal || current_bal_info.pen) {

        console.log(current_bal_info);
        console.log('updating' + current_interface);

        if(current_interface == 'outbox')
            updateOutboxIndex();

        if(current_interface == 'inbox')
            updateInboxIndex();
    }
}

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

updateOutboxIndex = function() {

    makeAjaxCallWithCallback('/outbox/index',{},function(msg) {
            $('#inmate-content').html(msg);
    });
}

updateInboxIndex = function() {

    makeAjaxCallWithCallback('/inbox/index',{},function(msg) {
            $('#inmate-content').html(msg);
    });
}
