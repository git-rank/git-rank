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

	$n_p = count($projects);
	//$n_v = count($variables);
/*
	echo 'id,node,type<br/>';
	foreach ($projects as $project) {
		echo $project['id'].','.$project['name'].',project<br/>';
	}
	foreach ($variables as $variable) {
		$variable['id'] += $n_p;
		echo $variable['id'].','.$variable['category'].' - '.$variable['name'].',variable<br/>';
	}
*/
	echo 'source,target,weight,type<br />';
	foreach ($projects as $project) {
		foreach ($variables as $variable) {
			echo ($variable['id']+$n_p).','.$project['id'].','.
			convertToRank($variable['type'], $project['variable_'.$variable['id']], $types).',undirected<br/>';
		}
	}
?>