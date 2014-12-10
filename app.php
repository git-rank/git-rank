<?php
	include_once('rank.php');

	function circularDisplay($value, $text) {
		$value *= 10;
		$a = pi()*(5/2-2*$value/10);
		$x = 50+cos($a)*38;
		$y = 50-sin($a)*38;
		$large = ($value > 5) ? 1 : 0;

		if ($value < 10)
			$value = sprintf('%.2f',round($value, 2));
		else
			$value = "10.0";

		return
		'
		<svg viewbox="0 0 500 100" >
			<circle cx="50" cy="50" r="38" stroke="#aaa" stroke-width="1" fill="none" />
			<path d="M 50 12 A 38 38 0 '.$large.' 1 '.$x.' '.$y.'" stroke="#046380" stroke-width="2" fill="none" />
			<text x="50" y="59" text-anchor="middle" font-size="28" fill="#046380" >'.$value.'</text>
			<text x="100" y="59" font-size="30" fill="#046380" >'.$text.'</text>
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
	<div id="loading" ><h1>Loading...</h1></div>
	<section id="logo" >
		<svg id="logo_svg" viewbox="0 0 210 100" >
			<circle cx="150" cy="50" r="38" stroke="#aaa" stroke-width="1" fill="none" />
			<path d="M 150 12 A 38 38 0 1 1 123 77" stroke="#046380" stroke-width="2" fill="none" />
			<text x="21" y="60" font-size="40" fill="#046380" >GitRank</text>
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
		<p id="choose_project" style="">Please choose any project</p>
	</section>

	<script src="jquery-2.1.1.min.js"></script>
	<script src="app.js"></script>
</body>
</html>