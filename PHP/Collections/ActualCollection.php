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
	protected $items = [];

	public function addItem($item,$key=false,$callback = null)
	{
		if ($key == false) {
			$this->items[] = $item;
		} else {
			$this->items[$key] = $item;
		}

		if (isset($callback)) {
			call_user_func($callback);
		}

		return true;
	}

	public function delItem($key,$callback = null)
	{
		if (!$this->hasKey($key)) {
			echo 'That key does not exist.  Please try again.';

			return false;
		}

		unset($this->items[$key]);

		if (isset($callback)) {
			call_user_func($callback);
		}

		return true;
	}

	public function getItem($key)
	{
		return $this->items[$key];
	}

	public function length()
	{
		return $this->count();
	}

	public function count()
	{
		return count($this->items);
	}

	public function clear()
	{
		foreach ($this->items as $key => $value) {
			unset($this->items[$key]);
		}
	}

	public function hasKey($key)
	{
		return array_key_exists($key, $this->items);
	}

	public function keys()
	{
		return array_keys($this->items);
	}

	public function current()
	{
		return current($this->items);
	}

	public function key()
	{
		return key($this->items);
	}

	public function next()
	{
		next($this->items);
	}

	public function rewind()
	{
		reset($this->items);
	}

	public function valid()
	{
		return $this->current() !== false;
	}
}

class ActualSortedCollection extends ActualCollection implements SortedCollection
{
	private $sort = null;

	public function setSort($sort = SortedCollection::SORT_ASC)
	{
		$this->sort = $sort;
	}

	public static function fromUnsorted(Collection $collection, $sort)
	{
		if ($sort == SortedCollection::SORT_DESC) {
			krsort($collection->items);
		} else {
			ksort($collection->items);
		}

		return $collection;
	}
}
