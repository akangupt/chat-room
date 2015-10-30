$.ajaxSetup ({
	cache: false
});
$(setInterval(function() {
	$('#onlineusers').load('onlineusers.php');
	$("#onlineusers").attr({ scrollTop: $('#onlineusers').attr('scrollHeight') });
}, 500));