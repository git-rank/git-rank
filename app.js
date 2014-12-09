function sizeLogo() {
	var container = $('#logo');
	var logo = $('#logo_svg');
	if(container.height()*2.1 < container.width()) {
		$('#logo_svg').css({
			width: 'auto',
			height: '100%'
		});
		$('#logo_svg').css({
			top: 0,
			left: (container.width()-logo.width())/2,
		});
	}
	else {
		$('#logo_svg').css({
			width: '100%',
			height: 'auto'
		});
		$('#logo_svg').css({
			'top': (container.height()-logo.height())/2,
			'left': 0
		});
	}
}
sizeLogo();

$(window).on('resize', function() {
	sizeLogo();
});