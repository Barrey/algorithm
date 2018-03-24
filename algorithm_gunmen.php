<?php
function maximumGunmen($arr, $wall){
	$gunmen = 0;
	$gunmenPos = [];
	$vertical = [];
	$horizontal = [];
	$element = null;
	$x = 1;
	// cari most wall tapi tidak boleh max sesuai count
	$a = 0;
	$mostWall = null;
	foreach ($arr as $k => $v) {
		$counts = array_count_values($arr[$a]);
		if($counts[$wall] < count($arr[$a])){
			$mostWall = $counts[$wall];	
			break;
		}
		$a++;	
	}
	
	$totalMostWall = 0;
	foreach($arr as $k => $v){
		$i = 1;
		
		foreach($v as $k2 => $v2){
			if($v2 != $wall){
				
				if($vertical[$i] != 'open' || !$vertical[$i]){
					
					if($horizontal[$x] != 'open'){
						array_push($gunmenPos, [$x, $i]);
						$vertical[$i] = 'open';
						$horizontal[$x] = 'open';
					}
				}
			}
			else if($v2 == $wall){
				$vertical[$i] = 'closed';
			}
			if($element != $v2){
				$horizontal[$x] = 'closed';
			}
			$element = $v2;
			$i++;
		}
		//hitung wall terbanyak
			$dataArr = array_count_values($v);
			$countWall = $dataArr[$wall];
			if($countWall == $mostWall){
				$totalMostWall++;
			}
		$x++;
	}
	$data['result'] = $gunmenPos;
	$data['most_wall'] = $totalMostWall;
	return $data;
}
function placeGunmen($arr){
}
function sortWall($arr, $wall){
	$wallTotal = [];
	foreach($arr as $k => $v){
		$counts = array_count_values($v);
		array_push($wallTotal, $counts[$wall]);
	}
	array_multisort($wallTotal, SORT_DESC, $arr, SORT_DESC);
	return $arr;
}
$data = [
	['x', 'x', 'x', '_'],
	['_', '_', '_', '_'],
	['_', 'x', '_', '_'],
	['x', 'x', 'x', '_'],
	['x', 'x', 'x', 'x']
];

$data2 = [
	['_', 'x', '_', 'x', '_', 'x', '_', 'x'],
	['_', '_', '_', '_', '_', 'x', '_', '_'],
	['x', '_', 'x', '_', '_', 'x', '_', 'x'],
	['_', '_', '_', '_', '_', '_', '_', '_'],
	['_', '_', '_', 'x', '_', '_', '_', '_'],
	['_', '_', '_', '_', '_', 'x', '_', 'x'],
	['_', 'x', '_', '_', '_', '_', '_', '_'],
	['_', '_', '_', '_', 'x', '_', 'x', '_']
];

$f = sortWall($data2, 'x');
$countGunMen = maximumGunmen($f, 'x');
$totalGunMen = count($countGunMen['result']);
$totalGunMenPlacement = $countGunMen['most_wall'];
// echo '<pre>';
// var_dump( $countGunMen['result'] );
// echo '</pre>';
// echo '<hr/>';
// echo $countGunMen['most_wall'];
echo '<hr/>';
echo 'total banyak gunmen = '.$totalGunMen;
echo '<br/>';
echo 'total banyak placemen gunmen = '.$totalGunMenPlacement;
?>