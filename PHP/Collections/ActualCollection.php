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
	public $mycollection = [];

	public function addItem($item,$key=false,$callback = null) {
		if ($key) {
			$this->mycollection[$key] = $item;
			if($callback){
				$callback();
			}
			return true;	
		}
		else {
			$this->mycollection[] = $item;
			return true;
		}
		return false;
	}

	public function delItem($key,$callback = null) {
		if(isset($this->mycollection[$key])){
			unset($this->mycollection[$key]);
			if($callback) {
				$callback();
			}
			return true;
		}
		return false;
	}

	public function getItem($key) {
		return $this->mycollection[$key];
	}

	public function length() {
		return count($this->mycollection);
	}

	public function count() {
		return count($this->mycollection);
	}
	
	public function clear() {
		$this->mycollection = [];
	}

	public function hasKey($key) {
		return array_key_exists($key, $this->mycollection);
	}

	public function keys() {
		return array_keys($this->mycollection);
	}
}

class ActualSortedCollection extends ActualCollection implements SortedCollection {
public $sortingorder = null;

	public function setSort($sort = SortedCollection::SORT_ASC) {
		if($sort) {
			$this->sortingorder = 1;
		}
		else {
			$this->sortingorder = 0;
		}
	}
	
	public static function fromUnsorted(Collection $collection, $sort) {
		if($sort) {
			krsort($collection);
		}
		else if($sort == 0) {
			ksort($collection);
		}
		return $collection;
	}

}
