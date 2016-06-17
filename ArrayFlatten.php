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

function flatten($array) {
    $flatten=array();
    foreach($array as $a){
        if(is_array($a)){
           $flatten=array_merge($flatten, flatten($a));
            
        }else{
           array_push($flatten,$a);
        }
        
    }
    return $flatten;   
}

function flattenArray($array) {
    return implode(',',flatten($array));
}

$array = [1,2,3,[4,5,6],[7,[8,9]]];
print flattenArray($array);
