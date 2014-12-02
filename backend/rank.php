<?php
	function convertToRank($type, $variables) {
		$variables_rank = new Array();
		switch ($type) {
			case 'ratio':
				$ratio_palier = 0.5;

				$max = max($avariables);
				if($max <= 0)
					$variables_rank = $variables;

				foreach ($variables as $variable) {
					if($variable < 1)
						$variables_rank.push($ratio_palier*$variable);
					else
						$variables_rank.push((1-$ratio_palier)*$variable/$max+$ratio_palier);
				}
				break;
			
			default:
				echo 'Type '.$type.' isn\'t defined';
				break;
		}

		return $variables_rank;
	}

$test_ratio = [0.5714285714,0.1,8.555555556,4.375,0.5,0.5789473684,0.6666666667,0.2482269504,0.06868131868,1.75,0.6869565217,0.1876880352,0.01102362205,0.04419475655,0.340218712,0.2549668874,0.1487603306,0.2873376623,0.1388888889,0.3823529412,0.1103789127,0.1211055276,0.1008645533,0.3759259259,0.07122507123,0.1428571429,0.1347583643,0,0.1324503311,0.4557522124,14.66666667,1.363636364,1.08,0.5166666667,0.119266055,0.09266628766,0.2295918367,0.0724852071,0.2513661202,0.48,0.1512027491,0.1533333333,0.5806451613,0,0.4101123596,0.4545454545,0.2481203008,12.25,1.571428571,0,0.03658536585,0.06557377049,0.03846153846,0.6559139785,0.8615384615,0.9895470383];
var_dump($test_ratio);
var_dump(convertToRank('ratio', $test_ratio));