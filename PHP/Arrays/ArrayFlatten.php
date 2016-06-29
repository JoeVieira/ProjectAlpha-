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

function flattenArray($array) {
  if(is_null($array) || empty($array)) {
		return array(-1);
	}
	$resultarray = [];
	foreach ($array as $element) {
		if (is_array($element)) {
			$resultarray = array_merge($resultarray, flattenArray($element));
		}
		else {
			array_push ($resultarray, $element);
		}		
	}
	return $resultarray;

}

$array = [1,2,3,[4,5,6],[7,[8,9]]];

print (implode(flattenArray($array)));
