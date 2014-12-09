<?php
	include_once('rank.php');

	function circularDisplay($value, $text) {
		$a = pi()*(5/2-2*$value/10);
		$x = 50+cos($a)*38;
		$y = 50-sin($a)*38;
		$large = ($value > 5) ? 1 : 0;

		if ($value < 10)
			$value = sprintf('%.2f',round($value, 2));
		else
			$value = "10.0";

		return
		'<svg width="100%" viewbox="0 0 500 100" >
			<circle cx="50" cy="50" r="38" stroke="#ccc" stroke-width="1" fill="none" />
			<path d="M 50 12 A 38 38 0 '.$large.' 1 '.$x.' '.$y.'" stroke="#4ea3b1" stroke-width="2" fill="none" />
			<text x="24" y="59" font-size="30" fill="#4ea3b1" >'.$value.'</text>
			<text x="100" y="59" font-size="30" fill="#4ea3b1" >'.$text.'</text>
		</svg>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Git-Rank</title>
	<link rel="stylesheet" type="text/css" href="app.css" >
</head>
<body>
	<section id="logo" >
		<svg id="logo_svg" viewbox="0 0 210 100" >
			<circle cx="150" cy="50" r="38" stroke="#ccc" stroke-width="1" fill="none" />
			<path d="M 150 12 A 38 38 0 1 1 123 77" stroke="#4ea3b1" stroke-width="2" fill="none" />
			<text x="21" y="60" font-size="40" fill="#4ea3b1" >GitRank</text>
		</svg>
	</section>
	<section id="ranking" >
		<h1>Ranking</h1>
		<?php
			foreach ($projects as $project) {
				$rank = rank($project, $variables, $types);
				echo '<div class="ranking_project">'.circularDisplay($rank, $project['name']).'</div>';
			}
		?>
	</section>
	<section id="projects" >
		<h1>Projects</h1>
		<p style="text-align:center;margin-top:20%;font-size:72px;">Please choose any project</p>
	</section>

	<script src="jquery-2.1.1.min.js"></script>
	<script>
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
	</script>
</body>
</html>