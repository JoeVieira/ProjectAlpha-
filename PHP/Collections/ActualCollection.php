<?php
/**
 * Created by IntelliJ IDEA.
 * User: vieiraj
 * Date: 5/17/16
 * Time: 12:52 PM
 */

require_once 'iCollection.php';

class ActualCollection implements Collection {

  public $position;
  public $collection;
  public $count;

  public function __construct() {
    $this->position = 0;
    $this->collection = array();
  }
  
  public function count() {
    return $this->count;
  }

  public function current() {
    return $this->collection[$this->position];
  }

  public function key() {
    return $this->position;
  }

  public function next() {
    $this->position++;
  }

  public function rewind() {
    $this->position = 0;
  }

  public function valid() {
    return isset($this->collection[$this->position]);
  }
  
  public function addItem($item,$key=false,$callback = null) {
    if ($key == false) {
      $index = array_search($item, $this->collection);

      if ($index == "") {
        $this->collection[] = $item;
        $this->count++;
        print("item has been added\n");
        return true;
      } else {
        return false;
      }

    } else {

      if (isset($this->collection[$key])) {
        return false;

      } else {
        $this->collection[$key] = $item;
        $this->count++;
        print("item has been added\n");
        return true;
      }      
    }

  }

  public function delItem($key,$callback = null) {
    if (isset($this->collection[$key])) {
      unset($this->collection[$key]);
      $this->count--;
      print("item has been deleted\n");
      return true;
    } else {
      return false;
    }
  }

  public function getItem($key) {
    return $this->collection[$key];
  }

  public function length() {
    return $this->count;
  }

  public function clear() {
    $this->collection = array();
    $this->count = 0;
  }

  public function hasKey($key) {
    return array_key_exists($key, $this->collection);
  }

  public function keys() {
    return array_keys($this->collection);
  }

}

class ActualSortedCollection extends ActualCollection implements SortedCollection {

  private $sort_order = null;

	public function setSort($sort = SortedCollection::SORT_ASC) {
		$this->sort_order = $sort;
	}

  public static function fromUnsorted(Collection $collection, $sort) {
    if ($sort == SortedCollection::SORT_ASC) {
      return asort($collection->keys());
    } elseif ($sort == SortedCollection::SORT_DESC) {
      return arsort($collection->keys());
    }
  }

}
