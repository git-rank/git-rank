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
	function radarGraph($title, $labels, $values) {
		$n = count($values);
		$a = 2*pi()/$n;
		$off_a = -pi()/2;

		$rayon = 40;
		$w = 420; $h = 100;
		$cx = ($w-200)/2+200; $cy = $h/2;
		$font_size = 10;

		$path = '';
		$text_labels = '';
		$path_value = '';
		$point_value = '';
		$text_values = '';
		for($i = 0; $i < $n; $i++) {
			// Path background
			$angle = $off_a+$i*$a;
			$x = $cx + cos($angle)*$rayon;
			$y = $cy + sin($angle)*$rayon;
			if($i == 0)
				$path .= 'M '.$x.' '.$y.' ';
			else
				$path .= 'L '.$x.' '.$y.' ';
			$path .= 'L '.$cx.' '.$cy.' ';
			$path .= 'L '.$x.' '.$y.' ';

			// Labels
			if($angle > -pi()/3 AND $angle < pi()/3) $anchor = 'start';
			else if($angle > 2*pi()/3 AND $angle < 5*pi()/3) $anchor = 'end';
			else $anchor = 'middle';
			$text_labels .= '
			<text x="'.($x+cos($angle)*5).'" y="'.($y+$font_size*(+sin($angle)+0.5)/1.5).'" text-anchor="'.$anchor.'"
			font-size="'.$font_size.'" fill="#046380" >'.$labels[$i].'</text>';

			// Path data
			$x = $cx + cos($angle)*$rayon*$values[$i];
			$y = $cy + sin($angle)*$rayon*$values[$i];
			if($i == 0)
				$path_value .= 'M '.$x.' '.$y.' ';
			else
				$path_value .= 'L '.$x.' '.$y.' ';
			$point_value .= '<circle cx="'.$x.'" cy="'.$y.'" r="1.5" fill="#046380" />';

			// Values on the left
			$text_values .='
			<text x="20" y="'.(20+$i*10).'" font-size="8" fill="#046380" text-anchor="start" >'.
				$labels[$i].' : '.$values[$i]
			.'</text>';
		}
		$path .= 'Z';
		$path_value .= 'Z';

		return
		'
		<svg class="radar_graph" viewbox="0 0 '.$w.' '.$h.'" >
			<text x="100" y="10" font-size="10" fill="#046380" text-anchor="middle" >'.$title.'</text>
			'.$text_values.'
			<path d="'.$path.'" stroke="#ccc" stroke-width="1" fill="none" />
			<path d="'.$path_value.'" stroke="#046380" stroke-width="1" fill="none" />
			'.$text_labels.$point_value.'
			<path d="M 1 1 H 420 V 100 H -420 Z" stroke="#c00" stroke-width="1" fill="none" />
		</svg>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Git-Rank</title>
	<link rel="stylesheet" type="text/css" href="app.css" >
	<link rel='stylesheet' href='Nwagon.css' type='text/css'>
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
				echo '<div class="ranking_project">'.circularDisplay($rank, $project['name']).'</div>';
			}
		?>
	</section>
	<section id="projects" >
		<h1>Projects</h1>
		<!-- <p id="choose_project" style="">Please choose any project</p> -->
		<div>
			<hr />
			<?= radarGraph("Title", ["Issues","Pull Requests","Commits","Others"],[0.2,0.5,0.5,0.9]) ?>
		</div>
	</section>

	<script src="jquery-2.1.1.min.js"></script>
	<script src="app.js"></script>
	<script>

	</script>
</body>
</html>