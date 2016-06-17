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
    $digRoot = 0;
    while($number>10)
    {
        $val = str_split($number);
        $tempNum = 1;
        foreach($val as $key => $value)
        {
            $tempNum = $tempNum * (int)$value;
        }  
        $number = $tempNum;
    }
    $digRoot = $number;
    return $digRoot;
}


foreach($printArray as $result) {
	echo "The multiplicative digital root of ".$result['input']." is ".$result['result'].".".PHP_EOL;
}
