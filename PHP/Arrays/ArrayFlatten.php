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

// This function assumes that the given array will only 
// contain two variable types: array and integer
$output_array = array();

function flattenArray($array) {

	global $output_array;

	foreach($array as $element) {
    if (gettype($element) == "integer") {
    	$output_array[] = $element;

    } elseif (gettype($element) == "array") {
    	flattenArray($element);
    }
	}
  return $output_array;
}

$array_original = [1,2,3,[4,5,6],[7,[8,9]]];
$array_1        = [1,2,3,[4,[5]],[6,[7,[8]]]];

$test_cases = [$array_original, $array_1];

for ($i = 0; $i < count($test_cases); $i++) {
	print("Here is test case #{$i}:");
	print_r($test_cases[$i]);

  print("Here is the answer for test case #{$i}");
  print_r(flattenArray($test_cases[$i]));
  $output_array = array();
}