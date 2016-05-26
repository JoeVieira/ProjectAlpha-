<?php

/**
 * Created by IntelliJ IDEA.
 * User: vieiraj
 * Date: 5/23/16
 * Time: 6:53 PM
 */
/* Prompt:
 *
 * Implement ActualCollection and ActualSortedCollection
 *  such that the example application below outputs the expected results
 * 
 * This implementation should be general purpose, scalable and readable. 
 *
 * example output: 
  key
  stdClass Object
  (
  )
  key8
  stdClass Object
  (
  )

  Sorting...

  key8
  stdClass Object
  (
  )
  key2
  stdClass Object
  (
  )
  key
  stdClass Object
  (
  )
 *
 */

require_once 'ActualCollection.php';


$collection = new ActualCollection();

$collection->addItem(new stdClass(), "key");
$collection->addItem(new stdClass(), "key8");
$collection->addItem(new stdClass(), "key2");

$collection->delItem("key2");

foreach ($collection as $key => $item) {
    print $key . "\n";
    print_r($item);
}

$sortedCollection = ActualSortedCollection::fromUnsorted($collection, SortedCollection::SORT_DESC);
print "\nSorting...\n\n";

$sortedCollection->addItem(new stdClass(), "key2");

foreach ($sortedCollection as $key => $item) {
    print $key . "\n";
    print_r($item);
}