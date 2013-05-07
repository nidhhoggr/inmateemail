$(function() {

  $("#dialog").dialog({
	autoOpen: false,
	modal: true,
	width: 400,
	height: 200,
	closeOnEscape: false,
	draggable: false,
	resizable: false,
	buttons: {
		'Yes, Keep Working': function(){
			$(this).dialog('close');
		},
		'No, Logoff': function(){
			// fire whatever the configured onTimeout callback is.
			// using .call(this) keeps the default behavior of "this" being the warning
			// element (the dialog in this case) inside the callback.
			$.idleTimeout.options.onTimeout.call(this);
		}
	}
  });

  var $countdown = $("#dialog-countdown");

  // start the idle timer plugin
  $.idleTimeout('#dialog', 'div.ui-dialog-buttonpane button:first', {
	idleAfter: 300,
	pollingInterval: 2,
	keepAliveURL: inmates_url + '/inbox/ajaxKeepAlive',
	serverResponseEquals: 'OK',
	onTimeout: function(){
		window.location = inmates_url + '/logout';
	},
	onIdle: function(){
		$(this).dialog("open");
	},
	onCountdown: function(counter){
                
		$countdown.html(counter); // update the counter
	}
  });
}); 
