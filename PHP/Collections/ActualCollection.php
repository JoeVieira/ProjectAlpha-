<?php
/**
 * Created by IntelliJ IDEA.
 * User: vieiraj
 * Date: 5/17/16
 * Time: 12:52 PM
 */
require_once 'iCollection.php';
class ActualCollection implements Collection {

  public $collection;

  public function __construct() {
    $this->collection = [];
  }

  public function addItem($item, $key=false, $callback = null) {
    $this->collection[$key] = $item;
  }

  public function delItem($key, $callback = null) {
    array_splice($this->collection, array_search($key, array_keys($this->collection)), 1);
  }
  /**
   * get item from the collection
   *
   * @param string $key collection item key
   *
   * @return mixed
   */
  public function getItem($key){}
  /**
   * Get collection length
   *
   * @return int
   */
  public function length(){}
  /**
   * Get collection length
   *
   * @return int
   */
  public function count(){}

  /**
   * Empty the collection
   *
   * @return void
   */
  public function clear(){}
  /**
   * @param string $key
   * @return bool
   */
  public function hasKey($key){}
  /**
   * @return array
   */
  public function keys(){}

  public function rewind()
  {
    reset($this->collection);
  }

  public function current()
  {
    $collection = current($this->collection);
    return $collection;
  }

  public function key()
  {
    $collection = key($this->collection);
    return $collection;
  }

  public function next()
  {
    $collection = next($this->collection);
    return $collection;
  }

  public function valid()
  {
    $key = key($this->collection);
    $collection = ($key !== NULL && $key !== FALSE);
    return $collection;
  }

}
class ActualSortedCollection extends ActualCollection implements SortedCollection {

  public $sort_direction;

  public function __construct() {
    $this->sort_direction = SortedCollection::SORT_ASC;
  }

  public function setSort($sort = SortedCollection::SORT_ASC) {
    $this->sort_direction = $sort;
  }

  public function sortArray($array, $sort_direction) {
    if ($sort_direction) {
      krsort($array);
    } else {
      ksort($array);
    }
    return $array;
  }

  public function addItem($item, $key=false, $callback = null) {
    $this->collection[$key] = $item;
    $this->collection = $this->sortArray($this->collection, $this->sort_direction);
  }

  public static function fromUnsorted(Collection $collection, $sort) {
    $sorted_collection = new ActualSortedCollection();
    $sorted_collection->collection = $collection->collection;
    $sorted_collection->collection = self::sortArray($sorted_collection->collection, $sort);
    $sorted_collection->setSort($sort);
    return $sorted_collection;
  }
}