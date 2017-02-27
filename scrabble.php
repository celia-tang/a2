<?php

function points($query, $multiplier, $star) {

	$points = ['eaotinrslu', 'dg','cmbp','hfwyv', 'k', ' ', ' ', 'jx', ' ', 'qz'];
	$count = 0;

	for ($j = 0; $j < strlen($query); $j++) {

		for ($i = 0; $i < 10; $i++) {
			if (strrchr($points[$i], $query[$j]) != false) {
				$count = $count + 1 + $i;

			}
		}
	} 

	//check for multiplier
	if ($multiplier == "triple") {
		$count  = $count * 3;
	} else if ($multiplier == "double") {
		$count  = $count * 2;
	} 

	//check for bingo
	if ($star == "true") {
		return $count + 50;
	} else {
		return $count;
	}
}
?>