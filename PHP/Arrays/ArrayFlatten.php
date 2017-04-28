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

function flattenArray($array) {

	$output_array = array();

	foreach($array as $element) {
    if (is_array($element)) {
      $output_array = array_merge($output_array, flattenArray($element));
    } else {
      $output_array[] = $element;
    }
	}

  return $output_array;
}

$test_cases = array(
  [1,2,3,[4,5,6],[7,[8,9]]],
  [1,2,3,[4,[5]],[6,[7,[8]]]],
  [1,[2,3,4,[5], [6,7, 8, 9]]]
);

foreach($test_cases as $test) {
  print_r(flattenArray($test));
}