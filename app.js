(function() {
	"use strict";

///////////////////////////////////////////
// on resize
///////////////////////////////////////////
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

///////////////////////////////////////////
// loader
///////////////////////////////////////////
	function loading() {
		$('#loading').show();
	}
	function unloading() {
		$('#loading').fadeOut('slow');
	}

///////////////////////////////////////////
// projects click/hover
///////////////////////////////////////////
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
				$('#choose_project').hide('slow');
				//$('#projects h1').show('slow');
			}
		}
		else {
			project.attr('project_clicked', 'no');
			nb_projects_showed--;
			if(nb_projects_showed == 0) {
				$('#choose_project').show('slow');
				//$('#projects h1').hide('slow');
			}
		}
	}

	function updateEvents() {
		$('.ranking_project').mouseleave(function(e){
			setProjectColor($(this));
		});
		$('.ranking_project').mouseenter(function(e){
			setProjectColorHover($(this));
		});
		$('.ranking_project').on("click", function(e){
			toggleClickProject($(this));
			setProjectColorHover($(this));
			$('#project_details_'+$(this).attr('project_id')).toggle('slow');
		});
		$('.remove_project').on("click", function(e){
			var project = $('.ranking_project[project_id='+$(this).attr('project_id')+']');
			toggleClickProject(project);
			setProjectColorHover(project);
			$('#project_details_'+project.attr('project_id')).toggle('slow');
			setProjectColor(project);
		});
		$("#variator .generate_rank").on("click", function(){
			getData();
		});
	}

///////////////////////////////////////////
// get data
///////////////////////////////////////////
	function getData() {
		loading();

		var data = {};
		$.each($('.variator_variable'), function(key, v){
			var $v = $(v);
			data['variable_'+$v.attr('variable_id')] = $v.val();
		});

		$.ajax({
			url: "get_data.php",
			type: "post",
			data: data,
			success: function(data) {
				var div = $(document.createElement('div'));
				div.html(data);

				$('#ranking_content').html(div.find('#ranking').html());
				$('#projects_content').html(div.find('#projects').html());
				$('#variables_content').html(div.find('#variables').html());
				updateEvents();
				$('#choose_project').show('slow');
				unloading();
			}
		});
	}
	getData();

///////////////////////////////////////////
// change screen
///////////////////////////////////////////
	var toPage = (function() {
		var act_page = 1;
		var timeouts = [];

		function changeOnePage(sens, delay) {
			if(sens == 'down')
				var page_to = act_page + 1;
			else if(sens == 'up')
				var page_to = act_page - 1;
			else
				var page_to = act_page;

			var pages = $('.page');
			for(var i = 0; i < pages.length; i++) {
				var $page = $(pages[i]);

				var page_id = $page.attr('page');
				var height = (page_id == page_to) ? '95%' : '0%';
				var top = (page_id-page_to)*95+'%';

				$page.animate({top: top, height: height}, delay, 'linear');
			}
			act_page = page_to;
		}

		return function(page_to, delay) {
			if(delay == undefined) delay = 0;

			for(var i = 0; i < timeouts.length; i++) {
				clearTimeout(timeouts[i]);
			}
			timeouts = []

			var diff = page_to - act_page;
			if(diff > 0) {
				var sens = 'down';
			}
			else if(diff < 0) {
				diff *= -1;
				var sens = 'up';
			}
			else {
				changeOnePage('stay', delay);
			}

			for(var i = 0; i < diff; i++) {
				timeouts.push(setTimeout((function(sens, delay) {
					return function() { changeOnePage(sens, delay); }
				})(sens, delay/diff), i*delay/diff));
			}
		}
	})();
	toPage(1);

	var link_clicked = false;
	$('#link_variator').click(function() {
		if(link_clicked) return;
		toPage(2, 300);
		$(this).hide();
		$('#link_projects').show();

		link_clicked = true;
		setTimeout(function(){link_clicked = false;}, 300);
	});
	$('#link_projects').click(function() {
		if(link_clicked) return;
		toPage(1, 300);
		$(this).hide();
		$('#link_variator').show();

		link_clicked = true;
		setTimeout(function(){link_clicked = false;}, 300);
	});
})();