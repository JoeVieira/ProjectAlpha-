<?php

/**
 * Implement calculateRoot that calculates the multiplicative digital root of the $number argument as an integer.
 *
 * example output:
 *
 * The multiplicative digital root of 7500 is 0.
 * The multiplicative digital root of 123 is 6.
 * The multiplicative digital root of 1337 is 8.
 *
 */

$inputArray = [7500, 123, 1337];
$printArray = [];

foreach($inputArray as $input) {

	$printArray[] = [
		'result' => calculateRoot($input),
		'input' => $input
	];

}

function calculateRoot($number) {
  $total = 0;
  $num_array = str_split($number);

  if (count($num_array) == 1) {
  	return $number;
  } else {
  	for ($i = 0; $i < count($num_array); $i++) {
  		if ($i == 0) {
  			$total = $num_array[$i];
  		} else {
  			$total = $total * $num_array[$i];
  		}
  	}
  	return calculateRoot($total);
  }
}

foreach($printArray as $result) {
	echo "The multiplicative digital root of ".$result['input']." is ".$result['result'].".".PHP_EOL;
}
