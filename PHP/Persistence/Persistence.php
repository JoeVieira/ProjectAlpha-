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

foreach ($inputArray as $input) {

    $printArray[] = [
        'result' => calculateRoot($input),
        'input' => $input
    ];
}

function calculateRoot($number)
{
    do {
        $charArray = str_split($number);

        $prev = null;
        $result = 1;
        foreach ($charArray as $k => $ch) {
            $result = $result * intval($ch);
            $prev = intval($ch);
        }
        $number = $result;
    } while (strlen($number) > 1);

    return $number;
}

foreach ($printArray as $result) {
    echo "The multiplicative digital root of " . $result['input'] . " is " . $result['result'] . "." . PHP_EOL;
}
