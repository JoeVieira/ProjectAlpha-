<?php

/**
 * Created by IntelliJ IDEA.
 * User: vieiraj
 * Date: 5/17/16
 * Time: 12:50 PM
 */
interface Collection extends Iterator, Countable
{

    /**
     * Add item to the collection
     *
     * @param mixed $item collection item
     * @param string $key collection item key
     *
     * @return bool
     */
    public function addItem($item, $key = false, $callback = null);

    /**
     * delete item from the collection
     *
     * @param string $key collection item key
     *
     * @return bool
     */
    public function delItem($key, $callback = null);

    /**
     * get item from the collection
     *
     * @param string $key collection item key
     *
     * @return mixed
     */
    public function getItem($key);

    /**
     * Get collection length
     *
     * @return int
     */
    public function length();

    /**
     * Get collection length
     *
     * @return int
     */
    public function count();

    /**
     * Empty the collection
     *
     * @return void
     */
    public function clear();

    /**
     * @param string $key
     * @return bool
     */
    public function hasKey($key);

    /**
     * @return array
     */
    public function keys();
}

interface SortedCollection extends Collection
{

    const SORT_ASC = 0;
    const SORT_DESC = 1;

    /**
     * Set sorting order
     *
     * @param int $sort
     * @return void
     */
    public function setSort($sort = SortedCollection::SORT_ASC);

    /**
     * build a sorted collection from a non-sorted one of a compatabile type
     *
     * @param Collection $collection
     * @param int $sort
     * @return SortedCollection
     */
    public static function fromUnsorted(Collection $collection, $sort);
}
