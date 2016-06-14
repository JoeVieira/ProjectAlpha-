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
	return implode(',', flatten($array));
}

function flatten($array) {
	$flattened = [];
	foreach($array as $elem) {
		if (is_array($elem)) {
			$flattened = array_merge($flattened, flatten($elem));
		} else {
			$flattened[] = $elem;
		}
	}
	return $flattened;
}

$array = [1,2,3,[4,5,6],[7,[8,9]]];
print flattenArray($array);
