function positionLogo() {
	if($('#logo').height()*2.1 < $('#logo').width()) {
		$('#logo_svg').css({
			'top': 0,
			'left': ($('#logo').width()-$('#logo_svg').width())/2
		});
	}
	else {
		$('#logo_svg').css({
			'top': ($('#logo').height()-$('#logo_svg').height())/2,
			'left': 0
		});
	}
}
positionLogo();

$(window).on('resize', function() {
	positionLogo();
});