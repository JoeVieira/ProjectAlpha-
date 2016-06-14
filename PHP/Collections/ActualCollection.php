<?php
/**
 * Created by IntelliJ IDEA.
 * User: vieiraj
 * Date: 5/17/16
 * Time: 12:52 PM
 */

require_once 'iCollection.php';

class ActualCollection implements Collection
{
	protected $array = [];

	public function addItem($item,$key=false,$callback = null) {
		if($key) {
			$this->array[$key] = $item;
		} else {
			$this->array[] = $item;
		}
		
	}

	public function delItem($key,$callback = null) {
		unset($this->array[$key]);
	}

	public function getItem($key) {
		return $this->array[$key];
	}


	public function length() {
		return count($this->array);
	}

	public function count() {
		return $this->length();
	}
	
	public function clear() {
		$this->array = [];
	}

	public function hasKey($key) {
		return array_key_exists($key, $this->array);
	}

	public function keys() {
		return array_keys($this->array);
	}

	public function current () {
		return current($this->array);
	}

	public function next () {
		return next($this->array);
	}

	public function rewind () {
		reset($this->array);
	}

	public function valid () {
		return current($this->array) !== false;
	}

	public function key () {
		return key($this->array);
	}
}

class ActualSortedCollection extends ActualCollection implements SortedCollection {
	private $sort_mode;

	public function addItem($item,$key=false,$callback = null) {
		if($key) {
			$this->array[$key] = $item;
		} else {
			$this->array[] = $item;
		}
		$this->sort();	
	}

	public function delItem($key,$callback = null) {
		unset($this->array[$key]);
	}

	public function setSort($sort = SortedCollection::SORT_ASC) {
		$this->sort_mode = $sort;
		$this->sort();
	}
	
	public static function fromUnsorted(Collection $collection, $sort) {
		$sorted_collection = new ActualSortedCollection	();
		$sorted_collection->array = $collection->array;
		$sorted_collection->setSort($sort);
		return $sorted_collection;
	}

	private function sort() {
		if($this->sort_mode == SORT_ASC) {
			ksort($this->array);
		} else {
			krsort($this->array);
		}
	}

}
