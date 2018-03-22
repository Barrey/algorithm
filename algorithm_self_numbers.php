<?php


function generateNumber($start, $end){
	$generatedNumber = [];
	for ($i=$start; $i <= $end; $i++) { 
		
		$count = strlen($i);
		$arr = str_split($i);
		$generated = $i;

		for ($x=0; $x < $count; $x++) { 
			$generated += $arr[$x];

			if($generated > $end){
				return ($generatedNumber);
			}
		}

		array_push($generatedNumber, $generated);

	}

	return ($generatedNumber);
}

$f = generateNumber(1,5000);
$g = range(1,5000);

sort($f);
// echo '<pre>';print_r($f);'</pre>';
// echo '<pre>';print_r($g);'</pre>';

$diff = array_diff($g, $f);
echo '<pre>';print_r($diff);'</pre>';
echo '<p>'.array_sum($diff).'</p>';
// var_dump($g);
?>