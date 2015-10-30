$.ajaxSetup ({
	cache: false
});

$(setInterval(function() {
	$('.main').load('DisplayMessages.php');
	$(".main").attr({ scrollTop: $('.main').attr('scrollHeight') });
}, 500));