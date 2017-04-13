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
  if (strlen($number) === 1) {
    $multiplicative_digital_root = $number;
  } else {
    $product = 1;
    foreach (str_split($number) as $single_digit) {
      $product = $product * $single_digit;
    }
    $multiplicative_digital_root = calculateRoot($product);
  }
  return $multiplicative_digital_root;
}

foreach($printArray as $result) {
	echo "The multiplicative digital root of ".$result['input']." is ".$result['result'].".".PHP_EOL;
}
