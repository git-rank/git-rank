<?php

	define("RANK_MAX_RATIO", 10);
	define("RANK_RATIO_LEVEL", 0.6);
	define("RANK_MAX_TEMPORAL", log(365, 2));

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
			$variable = log($variable+1, 2);
			if($variable > RANK_MAX_TEMPORAL) $variable = RANK_MAX_TEMPORAL;
			return 1-$variable/RANK_MAX_TEMPORAL;
		}
		else {
			echo 'Type '.$type.' isn\'t defined';
		}
	}
	echo convertToRank('temporal', 1);
?>