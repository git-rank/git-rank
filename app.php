<?php
	include_once('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Git-Rank</title>
	<link rel="stylesheet" type="text/css" href="app.css" >
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
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
		<div id="ranking_content"></div>
	</section>
	<section id="projects" class="page" page="1" >
		<h1>Projects</h1><hr />
		<p id="choose_project" style="">Please choose any project</p>
		<div id="projects_content"></div>
	</section>
	<section id="variator" class="page" page="2" >
		<h1>Variator</h1><hr />
	</section>
	<section id="links" >
		<svg id="link_variator" viewbox="0 0 50 5" >
			<text x="25" y="4" font-size="4" fill="#fff" text-anchor="middle" >Variator</text>
		</svg>
		<svg id="link_projects" style="display:none;" viewbox="0 0 50 5" >
			<text x="25" y="4" font-size="4" fill="#fff" text-anchor="middle" >Projects</text>
		</svg>
	</section>
	<script src="jquery-2.1.1.min.js"></script>
	<script src="app.js"></script>
</body>
</html>