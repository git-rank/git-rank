<?php

	define("RANK_MAX_RATIO", 10);
	define("RANK_RATIO_LEVEL", 0.6);
	function RANK_NB_F($x, $coeff) { return log($x*$coeff+1, 2); }

	$similar_types = array(
		// type 			=> [positive/negative, max, coeff]
		"temporal" 			=> array("negative", 365, 0.2),
		"commits" 			=> array("positive", 10000, 0.05),
		"issues_open" 		=> array("negative", 500, 0.02),
		"issues_closed" 	=> array("positive", 4000, 0.1),
		"pr_open" 			=> array("negative", 60, 0.001),
		"pr_closed" 		=> array("positive", 4000, 0.2),
		"contributors" 		=> array("positive", 150, 5),
		"stars" 			=> array("positive", 30000, 0.2),
		"fork" 				=> array("positive", 5000, 5),
		"releases" 			=> array("positive", 100, 2),
	);

	function convertToRank($type, $variable) {
		global $similar_types;

		if($type == 'ratio') {
			if($variable < 0) $variable = 0;
			if($variable > RANK_MAX_RATIO) $variable = RANK_MAX_RATIO;

			if($variable <= 1)
				return 1-$variable*RANK_RATIO_LEVEL;
			else
				return 1-((1-RANK_RATIO_LEVEL)*$variable/RANK_MAX_RATIO+RANK_RATIO_LEVEL);
		}
		else if($type == 'yesno') {
			if($variable == 'yes' OR $variable == 'oui')
				return 1;
			else
				return 0;
		}

		foreach ($similar_types as $t => $attr) {
			if($type == $t) {
				if($variable < 0) $variable = 0;
				$variable = RANK_NB_F($variable, $attr[2])/RANK_NB_F($attr[1], $attr[2]);

				if($attr[0] == "negative")
					return $variable >= 1 ? 0 : 1-$variable;
				else
					return $variable >= 1 ? 1 : $variable;
			}
		}

		echo 'Type '.$type.' isn\'t defined';
	}
?>