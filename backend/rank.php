<?php

	function convertToRank($type, $variables) {
		$variables_rank = Array();
		switch ($type) {
			case 'ratio':
				$ratio_palier = 0.5;

				$max = max($variables);
				if($max <= 0)
					$variables_rank = $variables;

				foreach ($variables as $variable) {
					if($variable < 1)
						array_push($variables_rank, $ratio_palier*$variable);
					else
						array_push($variables_rank, (1-$ratio_palier)*$variable/$max+$ratio_palier);
				}
				break;

			case 'temporal':
				$temp = Array();

				foreach ($variables as $variable) {
					array_push($temp, log($variable+1));
				}
				$max = max($temp);
				foreach ($temp as $t) {
					array_push($variables_rank, 1-$variable/$max);
				}
				break;
			
			default:
				echo 'Type '.$type.' isn\'t defined';
				break;
		}

		return $variables_rank;
	}
?>