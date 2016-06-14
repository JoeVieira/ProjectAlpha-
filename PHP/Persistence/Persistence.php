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
	if ($number < 10) {
		return $number;
	}
	$digits = [];
	while($number >= 10) {
		$digits[] = $number % 10;
		$number = (int) $number / 10;
	}
	$digits[] = (int) $number;
	$next = 1;
	foreach($digits as $digit) {
		$next = $next * $digit;
	}
	return calculateRoot($next);
}

foreach($printArray as $result) {
	echo "The multiplicative digital root of ".$result['input']." is ".$result['result'].".".PHP_EOL;
}
