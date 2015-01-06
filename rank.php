<?php

	function RANK_NB_F($x) {
		return log($x+1, 2);
	}

	function convertToRank($type, $variable, $types) {
		$variable -= $types[$type]['min'];
		if($variable < 0) $variable = 0;
		$variable = RANK_NB_F($variable)/RANK_NB_F($types[$type]['max']);

		if($types[$type]['pos_neg'] == "negative")
			return $variable >= 1 ? 0 : 1-$variable;
		else
			return $variable >= 1 ? 1 : $variable;

		echo 'Type '.$type.' isn\'t defined';
	}

	function normalizeCoeffs($variables) {
		$l = count($variables);
		$sum_coeffs = 0;
		for ($i = 0; $i < $l; $i++) {
			$sum_coeffs += $variables[$i]['coeff'];
		}
		for ($i = 0; $i < $l; $i++) {
			$variables[$i]['coeff'] /= $sum_coeffs;
		}
		return $variables;
	}

	function rank($project, $variables, $types) {
		// Computing rank
		$rank = 0;
		$sum_coeffs = 0;
		foreach ($variables as $variable) {
			$sum_coeffs += $variable['coeff'];
			$rank += $variable['coeff'] * convertToRank($variable['type'], $project['variable_'.$variable['id']], $types);
		}

		return $rank/$sum_coeffs;
	}

	function subrank($project, $variables, $types) {
		// Computing rank
		$subrank = [];
		$sum_coeffs = [];
		foreach ($variables as $variable) {
			if(!isset($subrank[$variable['category']])) {
				$subrank[$variable['category']] = 0;
				$sum_coeffs[$variable['category']] = 0;
			}
			$subrank[$variable['category']] += $variable['coeff'] * convertToRank($variable['type'], $project['variable_'.$variable['id']], $types);
			$sum_coeffs[$variable['category']] += $variable['coeff'];
		}

		foreach ($subrank as $key => $sub) {
			if($sum_coeffs[$key] == 0)
				$subrank[$key] = 1;
			else
				$subrank[$key] = $sub / $sum_coeffs[$key];
		}

		return $subrank;
	}

	function variablesConverted($project, $variables, $types) {
		// Computing rank
		$variables_converted = array();
		foreach ($variables as $variable) {
			if($variable['coeff'] > 0) {
				$value = convertToRank($variable['type'], $project['variable_'.$variable['id']], $types);
				$variables_converted[$variable['category'].' - '.$variable['name'].' ('.displayValue($value).')'] = $value;
			}
		}
		return $variables_converted;
	}

	/*
	foreach ($projects as $project) {
		echo $project['name'].' : '.$project['rank'].'<br/>';
		foreach ($project['subrank'] as $s => $p) {
			echo '- '.$s.' : '.$p.'<br />';
		}
		echo '<br/>';
	}
	*/
?>