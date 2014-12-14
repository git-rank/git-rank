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
	function onResize() {
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

	// Hover projects
	var nb_projects_showed = 0;
	function setProjectColor(project) {
		if(project.attr('project_clicked') == 'no') {
			project.find('text').attr('fill', '#046380');
			project.find('path').attr('stroke', '#046380');
			project.css('background-color', '#ecf0f1');
		}
	}
	function setProjectColorHover(project) {
		if(project.attr('project_clicked') == 'no') {
			project.find('text').attr('fill', '#fff');
			project.find('path').attr('stroke', '#fff');
			project.css('background-color', '#046380');
		}
	}
	function toggleClickProject(project) {
		if(project.attr('project_clicked') == 'no') {
			project.attr('project_clicked', 'yes');
			nb_projects_showed++;
			if(nb_projects_showed == 1) {
				$('#choose_project').hide();
			}
		}
		else {
			project.attr('project_clicked', 'no');
			nb_projects_showed--;
			if(nb_projects_showed == 0) {
				$('#choose_project').show('slow');
			}
		}
	}
	$('.ranking_project').mouseleave(function(e){
		setProjectColor($(this));
	});
	$('.ranking_project').mouseenter(function(e){
		setProjectColorHover($(this));
	});
	$('.ranking_project').click(function(e){
		toggleClickProject($(this));
		setProjectColorHover($(this));
		$('#project_details_'+$(this).attr('project_id')).toggle('slow');
	});
})();