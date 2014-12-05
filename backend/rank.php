<?php

	define("RANK_MAX_RATIO", 10);
	define("RANK_RATIO_LEVEL", 0.6);
	function RANK_TEMPORAL_F($x) { return log($x*0.2+1, 2); }
	define("RANK_MAX_TEMPORAL", RANK_TEMPORAL_F(365));

	function convertToRank($type, $variable) {
		if($type == 'ratio') {
			$ratio_palier = 0.5;

			if($variable < 0) $variable = 0;
			if($variable > RANK_MAX_RATIO) $variable = RANK_MAX_RATIO;

			if($variable <= 1)
				return 1-$variable*RANK_RATIO_LEVEL;
			else
				return 1-((1-RANK_RATIO_LEVEL)*$variable/RANK_MAX_RATIO+RANK_RATIO_LEVEL);
		}
		else if($type == 'temporal') {
			if($variable < 0) $variable = 0;
			$variable = RANK_TEMPORAL_F($variable);
			if($variable > RANK_MAX_TEMPORAL) $variable = RANK_MAX_TEMPORAL;
			return 1-$variable/RANK_MAX_TEMPORAL;
		}
		else if($type == 'yesno') {
			if($variable == 'yes' OR $variable == 'oui')
				return 1;
			else
				return 0;
		}
		else {
			echo 'Type '.$type.' isn\'t defined';
		}
	}
	echo convertToRank('yesno', 'oui');
?>