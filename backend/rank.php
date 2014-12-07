<?php

	require_once('db.php');

	define("RANK_MAX_RATIO", 10);
	define("RANK_RATIO_LEVEL", 0.6);
	function RANK_NB_F($x) { return log($x+1, 2); }

	$similar_types = array(
		// type 			=> ["positive"/"negative", min, max]
		"ratio" 			=> array("negative", 0, 10),
		"temporal" 			=> array("negative", 3, 365),
		"commits" 			=> array("positive", 0, 10000),
		"issues_open" 		=> array("negative", 0, 500),
		"issues_closed" 	=> array("positive", 0, 4000),
		"pr_open" 			=> array("negative", 0, 60),
		"pr_closed" 		=> array("positive", 0, 4000),
		"contributors" 		=> array("positive", 0, 150),
		"stars" 			=> array("positive", 0, 30000),
		"fork" 				=> array("positive", 0, 5000),
		"releases" 			=> array("positive", 0, 100)
	);

	function convertToRank($type, $variable) {
		global $similar_types;

		/*if($type == 'ratio') {
			if($variable < 0) $variable = 0;
			if($variable > RANK_MAX_RATIO) $variable = RANK_MAX_RATIO;

			if($variable <= 1)
				return 1-$variable*RANK_RATIO_LEVEL;
			else
				return 1-((1-RANK_RATIO_LEVEL)*$variable/RANK_MAX_RATIO+RANK_RATIO_LEVEL);
		}*/
		if($type == 'yesno') {
			if($variable == 'yes' OR $variable == 'oui')
				return 1;
			else
				return 0;
		}

		foreach ($similar_types as $t => $attr) {
			if($type == $t) {
				$variable -= $attr[1];
				if($variable < 0) $variable = 0;
				$variable = RANK_NB_F($variable)/RANK_NB_F($attr[2]);

				if($attr[0] == "negative")
					return $variable >= 1 ? 0 : 1-$variable;
				else
					return $variable >= 1 ? 1 : $variable;
			}
		}

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

	function rank($project, $variables) {
		// Computing rank
		$rank = 0;
		foreach ($variables as $variable) {
			$rank += $variable['coeff'] * convertToRank($variable['type'], $project['variable_'.$variable['id']]);
		}

		return $rank;
	}

	
	$db = DataBase::getInstance();
	$projects = $db->query('SELECT * FROM project')->fetchAll();
	$variables = $db->query('SELECT * FROM variable')->fetchAll();
	$variables = normalizeCoeffs($variables);
	foreach ($projects as $project) {
		$rank = rank($project, $variables);
		echo $project['name'].' : '.$rank.'<br/>';
	}
?>