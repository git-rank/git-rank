<?php

	require_once('db.php');

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
		foreach ($variables as $variable) {
			$rank += $variable['coeff'] * convertToRank($variable['type'], $project['variable_'.$variable['id']], $types);
		}

		return $rank;
	}

	
	$db = DataBase::getInstance();
	$projects = $db->query('SELECT * FROM project')->fetchAll();
	$variables = $db->query('SELECT * FROM variable')->fetchAll();
	$types = $db->query('SELECT * FROM type')->fetchAll();
	$variables = normalizeCoeffs($variables);
	foreach ($types as $t) {
		$types[$t['name']] = $t;
	}
	/*
	foreach ($projects as $project) {
		$rank = rank($project, $variables, $types);
		//echo $project['name'].','.$rank.'<br/>';
	}*/
?>