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
    public $col = array();
    public function addItem($item,$key=false,$callback = null)
    {
        if($key)
        {
               $col[$key][] = $item;
               
               if($callback)
                {
                    $callback();
                }
            return true;
        }
        return false;
    }
    
    public function delItem($key,$callback = null)
    {
        if($col[$key])
        {
            unset($col[$key]);
            
            if($callback)
            {
                $callback();
            }
            return true;
        }
        
        return false;
    }
    
    public function getItem($key)
    {
        if($col[$key])
        {
            return $col[$key];
        }
        else
        {
            return null;
        }
    }
    
    public function length()
    {
        return count($col);
    }
    
    public function count()
    {
        return count($col);
    }
    
    public function clear()
    {
        foreach($col as $keys => $values)
        {
            unset($col[$values]);
        }
        unset($col);
    }
    
    public function hasKey($key)
    {
        if($col[$key])
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


class ActualSortedCollection extends ActualCollection implements SortedCollection {
    
    private $sortDir = SORT_ASC;
    
    
    public function setSort($sort = SortedCollection::SORT_ASC)
    {
        if($sort == SORT_ASC)
        {
            $sortDir = SORT_ASC;
        }
        else if($sort == SORT_DESC)
        {
            $sortDir = SORT_DESC;
        }
    }
    
    public static function fromUnsorted(Collection $collection, $sort)
    {
        if($sort)
        {
            setSort($sort);
        }
        
        if($sortDir == SORT_ASC)
        {
            ksort($col);
            return this;
        }
        if($sortDir == SORT_DESC)
        {
            krsort($col);
            return this;
        }
    }
    
    
}


