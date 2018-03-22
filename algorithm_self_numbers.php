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

$diff = array_diff($g, $f);

echo '<p>Total sum of all self-numbers between (1-5000) = '.array_sum($diff).'</p>';

?>