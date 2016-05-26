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

    protected $items;

    public function __construct()
    {
        $this->items = array();
    }

    public function addItem($item, $key = false, $callback = null)
    {
        if ($key == null) {
            $this->items[] = $item;

            return true;
        } else {
            if (isset($this->item[$key])) {
                return false;
            } else {
                $this->items[$key] = $item;

                return true;
            }
        }
    }

    public function delItem($key, $callback = null)
    {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);

            return true;
        } else {
            return false;
        }
    }

    public function getItem($key)
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        } else {
            return null;
        }
    }

    public function length()
    {
        return count($this->items);
    }

    public function count()
    {
        return count($this->items);
    }

    public function clear()
    {
        foreach ($this->items as $key => $item) {
            unset($this->items[$key]);
        }
    }

    public function hasKey($key)
    {
        return isset($this->items[$key]);
    }

    public function keys()
    {
        return array_keys($this->items);
    }

    public function current()
    {
        $var = current($this->items);
        return $var;
    }

    public function next()
    {
        $var = next($this->items);
        return $var;
    }

    public function key()
    {
        $var = key($this->items);
        return $var;
    }

    public function valid()
    {
        $key = key($this->items);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }

    public function rewind()
    {
        reset($this->items);
    }

}

class ActualSortedCollection extends ActualCollection implements SortedCollection
{

    private $sort;

    public function __construct($sort)
    {
        parent::__construct();
        $this->setSort($sort);
    }

    public function setSort($sort = SortedCollection::SORT_ASC)
    {
        $this->sort = $sort;
    }

    public static function fromUnsorted(Collection $collection, $sort)
    {
        $toBeReturned = new ActualSortedCollection($sort);

        $keys = $collection->keys();
        $sortedKeys = array();

        if ($sort == 0) {
            asort($keys);
        } else {
            arsort($keys);
        }

        foreach ($keys as $key) {
            $toBeReturned->addItem($collection->getItem($key), $key);
        }

        return $toBeReturned;
    }

    public function addItem($item, $key = false, $callback = null)
    {
        $counter = 0;
        foreach ($this->items as $itemKey => $value) {
            $counter++;
            if ($itemKey > $key) {
                break;
            }
        }

        $temp = array_slice($this->items, 0, $counter, true) +
                array($key => $item) +
                array_slice($this->items, $counter, NULL, true);

        $this->items = $temp;
    }

}
