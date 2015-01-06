<?php
	
	function displayValue($value) {
		$value *= 10;

		if ($value < 10)
			$value = sprintf('%.2f',round($value, 2));
		else
			$value = "10.0";

		return $value;
	}
	function circularDisplay($value, $text) {
		$a = pi()*(5/2-2*$value);
		$x = 50+cos($a)*38;
		$y = 50-sin($a)*38;
		$large = ($value > 0.5) ? 1 : 0;

		$value = displayValue($value);

		return
		'
		<svg viewbox="0 0 500 100" >
			<circle cx="50" cy="50" r="38" stroke="#aaa" stroke-width="1" fill="none" />
			<path d="M 50 12 A 38 38 0 '.$large.' 1 '.$x.' '.$y.'" stroke="#046380" stroke-width="2" fill="none" />
			<text x="50" y="59" text-anchor="middle" font-size="28" fill="#046380" >'.$value.'</text>
			<text x="100" y="59" font-size="30" fill="#046380" >'.$text.'</text>
		</svg>';
	}
	function radarGraph($title, $labels, $values, $project_id, $project_rank) {
		$n = count($values);
		$a = 2*pi()/$n;
		$off_a = -pi()/2;

		$w = 420; $h = 150;
		$rayon = $h/3;
		//$cx = ($w-200)/2+190;
		$cx = $w/2;
		$cy = 30+$rayon;
		$font_size = 7;

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
			if($angle > -pi()/2 AND $angle < pi()/2) $anchor = 'start';
			else if($angle > pi()/2 AND $angle < 2*pi()) $anchor = 'end';
			else $anchor = 'middle';
			$text_labels .= pow(sin($angle),2).'
			<text x="'.($x+cos($angle)*8).'" y="'.($y+$font_size*(sin($angle)*pow(sin($angle),20)+1/2)).'" text-anchor="'.$anchor.'"
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
			/*$text_values .='
			<text x="50" y="'.(25+$i*$font_size*1.2).'" font-size="'.$font_size.'" fill="#046380" text-anchor="start" >'.
				$labels[$i].' : '.displayValue($values[$i])
			.'</text>';*/
		}
		$path .= 'Z';
		$path_value .= 'Z';

		return
		'
		<svg class="radar_graph" viewbox="0 0 '.$w.' '.$h.'" >
			<a xlink:href="http://www.github.com/'.$title.'" target="_blank">
				<text x="'.($w/2).'" y="10" font-size="12" fill="#046380" text-anchor="middle" >'.$title.' ('.displayValue($project_rank).')</text>
			</a>
			<text class="remove_project" project_id="'.$project_id.'" x="16" y="'.($h/2+8).'" font-size="16" fill="#046380" text-anchor="start" >&lt;</text>
			'.$text_values.'
			<path d="'.$path.'" stroke="#ccc" stroke-width="1" fill="none" />
			<path d="'.$path_value.'" stroke="#046380" stroke-width="1" fill="none" />
			'.$text_labels.$point_value.'
		</svg>';
	}
?>