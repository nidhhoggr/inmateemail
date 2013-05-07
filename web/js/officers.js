var pg_trans = false;

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

        var args = {
            email_id: email_id
        }

        pg_trans = "slow";
        makeAjaxCallWithCallback('/email_outgoing/ajaxApproveEmail',args,function(msg) {
            msg = $.parseJSON(msg);
            viewOutgoingByEmailId(msg.email_id);
            updateCountUnscanned();
        });
    });

    $('#disapprove_outgoing_email').live('click',function() {

        var email_id = $(this).data('email-id');

        var args = {
            email_id: email_id
        }

        pg_trans = "slow";
        makeAjaxCallWithCallback('/email_outgoing/ajaxDisapproveEmail',args,function(msg) {
            msg = $.parseJSON(msg);
            viewOutgoingByEmailId(msg.email_id);
            updateCountUnscanned();
        });
    });

    $('#approve_incoming_email').live('click',function() {

        var email_id = $(this).data('email-id');

        var args = {
            email_id: email_id
        }

        pg_trans = "slow";

        makeAjaxCallWithCallback('/email_incoming/ajaxApproveEmail',args,function(msg) {
            msg = $.parseJSON(msg);
            viewIncomingByEmailId(msg.email_id);
            updateCountUnscanned();
        });
    });

    $('#disapprove_incoming_email').live('click',function() {

        var email_id = $(this).data('email-id');

        var args = {
            email_id: email_id
        }
   
        pg_trans = "slow";

        makeAjaxCallWithCallback('/email_incoming/ajaxDisapproveEmail',args,function(msg) {
            msg = $.parseJSON(msg);
            viewIncomingByEmailId(msg.email_id);
            updateCountUnscanned();
        });
    });

    $(document).tooltip();

    setInterval(function() {
        updateCountUnscanned();
    },10000);
});

var viewIncomingByEmailId = function(email_id) {
    if(email_id != null)
      makeAjaxCall('/email_incoming/view',{id:email_id});
    else 
      $('.email_approval').html('All of the incoming emails have been scanned!');
}

var viewOutgoingByEmailId = function(email_id) {
    if(email_id != null)
      makeAjaxCall('/email_outgoing/view',{id:email_id});
    else
      $('.email_approval').html('All of the outgoing emails have been scanned!');
}


var makeAjaxCall = function(route,data) {

    $.ajax({
        type: 'POST',
        data: data,
        url: officers_url + route,
        success: function(msg){
 
            if(pg_trans)
              $('#officer-content').hide().html(msg).fadeIn(pg_trans);
            else
              $('#officer-content').html(msg);

            pg_trans = false;
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

updateCountUnscanned = function() {

    makeAjaxCallWithCallback('/email_incoming/ajaxCountUnscanned',{},function(msg) {
            msg = $.parseJSON(msg);
        console.log(msg);     
        $('#count_unscanned span').html(msg.count_unscanned);
    });
}
