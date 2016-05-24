<?php

$inputArray = [7500, 123, 1337];
$printArray = [];

foreach($inputArray as $input) {

	$printArray[] = [
		'result' => persistence($input),
		'input' => $input
	];

}

function persistence($number) {
	/*
		Calculate the number here
	*/
}

foreach($printArray as $result) {
	echo "The persistence number of ".$result['input']." is ".$result['result'].".".PHP_EOL;
}

