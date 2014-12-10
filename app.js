(function() {
	"use strict";

	// Resize
	function sizeLogo() {
		var container = $('#logo');
		var logo = $('#logo_svg');
		if(container.height()*2.1 < container.width()) {
			$('#logo_svg').css({
				'width': 'auto',
				'height': '100%'
			});
			$('#logo_svg').css({
				'top': 0,
				'left': (container.width()-logo.width())/2,
			});
		}
		else {
			$('#logo_svg').css({
				'width': '100%',
				'height': 'auto'
			});
			$('#logo_svg').css({
				'top': (container.height()-logo.height())/2,
				'left': 0
			});
		}
	}
	function sizeInterface() {
		var w = $(window).width();
		var h = $(window).height();

		if(w > h) {
			$('#logo').css({
				'width': '30%',
				'height': '20%',
				'top': '0%',
				'left': '0%',
				'border': 'none',
			});
			$('#ranking').css({
				'width': '30%',
				'height': '80%',
				'top': '20%',
				'left': '0%',
				'border': 'none',
				'border-right': '2px solid #046380'
			});
			$('#projects').css({
				'width': '70%',
				'height': '100%',
				'top': '0%',
				'left': '30%'
			});
		}
		else {
			$('#logo').css({
				'width': '40%',
				'height': '40%',
				'top': '0%',
				'left': '0%',
				'border': 'none',
				'border-bottom': '2px solid #046380',
			});
			$('#ranking').css({
				'width': '60%',
				'height': '40%',
				'top': '0%',
				'left': '40%',
				'border': 'none',
				'border-bottom': '2px solid #046380'
			});
			$('#projects').css({
				'width': '100%',
				'height': '60%',
				'top': '40%',
				'left': '0%'
			});
		}
	}
	function onResize() {
		sizeInterface();
		sizeLogo();
	}
	onResize();
	$(window).on('resize', onResize);

	// Loader
	function loading() {
		$('#loading').show();
	}
	function unloading() {
		$('#loading').fadeOut('slow');
	}
	unloading();

	// Hover
	$('.ranking_project').mouseover(function(e){
		$(this).find('text').attr('fill', '#fff');
		$(this).find('path').attr('stroke', '#fff');
	});
	$('.ranking_project').mouseout(function(e){
		$(this).find('text').attr('fill', '#046380');
		$(this).find('path').attr('stroke', '#046380');
	});
})();