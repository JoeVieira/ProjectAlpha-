<?php
/**
 * Created by IntelliJ IDEA.
 * User: vieiraj
 * Date: 5/23/16
 * Time: 6:53 PM
 */

/* Prompt:
 * Flatten the output of an array structure such that all values inside the array structure
 *  can be output with print
 *
 * Example input: [1,2,3,[4,5,6],[7,[8,9]]]
 * Example output: 1,2,3,4,5,6,7,8,9
 *
 * Your solution should be scalable, concise and readable.
 *
 */

function flattenArray($array)
{
    $result = [];

    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result[] = flattenArray($value);
            continue;
        }

        $result[$key] = $value;
    }

    return implode(',', $result);
}

$array = [1,2,3,[4,5,6],[7,[8,9]]];

print flattenArray($array);
