<?php
	include_once('functions.php');
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
			<path d="M 150 12 A 38 38 0 1 1 123 77" stroke="#fff" stroke-width="2" fill="none" />
			<text x="21" y="60" font-size="40" fill="#fff" >GitRank</text>
		</svg>
	</section>
	<section id="ranking" >
		<h1>Ranking</h1>
		<?php
			foreach ($projects as $project) {
				$rank = rank($project, $variables, $types);
				echo '<div class="ranking_project" project_id="'.$project['id'].'" project_clicked="no" >'.
					circularDisplay($rank, $project['name'])
				.'</div>';
			}
		?>
	</section>
	<section id="projects" >
		<h1>Projects</h1>
		<p id="choose_project" style="">Please choose any project</p>
		<?php
			foreach ($projects as $project) {
				$title =  $project['name'];
				$labels = array();
				$values = array();
				foreach ($project['subrank'] as $label => $value) {
					array_push($labels, $label);
					array_push($values, $value);
				}
				echo '<div id="project_details_'.$project['id'].'" class="project_details" >';
				echo radarGraph($title, $labels, $values) .'<hr /></div>';
			}
		?>
	</section>

	<script src="jquery-2.1.1.min.js"></script>
	<script src="app.js"></script>
	<script>

	</script>
</body>
</html>