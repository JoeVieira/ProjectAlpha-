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
    $result = "";

    foreach ($array as $arr) {
        $val = null;

        print(count($arr) . "\n");

        if (count($arr) > 1) {
            print("IF\n");
            $val = flattenArray($arr);
        } else {
            print("Else\n");
            $val = $arr;
        }
        $result = $result . $val . ",";
    }

    $result = rtrim($result, ',');

    return $result;
}

$array = [1, 2, 3, [4, 5, 6], [7, [8, 9]]];

print flattenArray($array);
