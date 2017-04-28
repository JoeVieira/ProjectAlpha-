<?php
/**
 * Created by IntelliJ IDEA.
 * User: vieiraj
 * Date: 5/17/16
 * Time: 12:52 PM
 */

require_once 'iCollection.php';

class ActualCollection implements Collection {

  private $collection = array();
  private $position = 0;
  private $array = array();

  public function rewind() {
    $this->position = 0;
  }

  public function current() {
    return $this->array[$this->position];
  }

  public function key() {
    return $this->position;
  }

  public function next() {
    ++$this->position;
  }

  public function valid() {
    return isset($this->array[$this->position]);
  }

  public function addItem($item, $key=false, $callback = null) {
    if (!is_null($callback)) {
      call_user_func($callback);
    }
    if ($key == false) {
      $this->collection[] = $item;
    } else {
      $this->collection[$key] = $item;
    }
  }

  public function delItem($key, $callback = null) {
    if (!is_null($callback)) {
      call_user_func($callback);
    }
  	unset($this->collection[$key]);
  }

  public function getItem($key) {
  	return $this->collection[$key];
  }

  public function length() {
  	return count($this->collection);
  }

  public function count() {
  	return count($this->collection);
  }

  public function clear() {
  	$this->collection = array();
  }

  public function hasKey($key) {
  	return isset($this->collection[$key]);
  }

  public function keys() {
  	return array_keys($this->collection);
  }


}

class ActualSortedCollection extends ActualCollection implements SortedCollection {

	public function setSort($sort = SortedCollection::SORT_ASC) {
		if ($sort == SORT_ASC) {
			asort($this->collection);
		} elseif ($sort == SORT_DESC) {
			arsort($this->collection);
		}
	}

  public static function fromUnsorted(Collection $collection, $sort) {
    if ($sort == SortedCollection::SORT_ASC) {
      return asort($collection);
    } elseif ($sort == SortedCollection::SORT_DESC) {
      return arsort($collection);
    }
  }

}
