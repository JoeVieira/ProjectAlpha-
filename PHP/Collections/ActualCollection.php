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
  public $collectionArray = array();
  private $position = 0;
  
  public function addItem($item,$key=false,$callback = null)
  {
    if ($this->hasKey($key)) {
      return false;
    } else {
      $this->collectionArray[$key] = $item;
      return true;
    }
  }
	
  public function delItem($key,$callback = null)
  {
    if($this->hasKey($key)){
      unset($this->collectionArray[$key]);
      return true;
    } else {
     return false; 
    }
  }

  public function getItem($key)
  {
    if($this->hasKey($key)){
      return ($this->collectionArray[$key]);
    } else {
      return false; 
    }
  }
  
  public function length(){
    return(count($this->collectionArray)); 
  }
  public function count(){
    return($this->length()); 
  }
	
  public function clear()
  {
    $this->collectionArray = array();
  }

  public function hasKey($key)
  {
    return( isset($this->collectionArray[$key]));
  }
  
  public function keys()
  {
    return array_keys($this->collectionArray); 
  }
	
  public function current()
  {
    $keys = $this->keys();
    return $this->collectionArray[$keys[$this->position]];
  }
  
  public function key()
  {
    $keys = $this->keys();
    return $keys[$this->position];  
  }
	
  public function next()
  {
    ++$this->position;	  
  }
  public function rewind() {
    $this->position = 0;
  }
  public function valid() {
    $keys = $this->keys();
    if (!isset($keys[$this->position])) {
        return false;
    }
    return isset($this->collectionArray[$keys[$this->position]]);
  }
}

class ActualSortedCollection extends ActualCollection implements SortedCollection {

  private $sortOrder;

  public function setSort($sort = SortedCollection::SORT_ASC)
  {
    $this->sortOrder = $sort; 
  }

  public function addItem($item,$key=false,$callback = null)
  {
    parent::addItem($item,$key);
    if ($this->count() > 1) {
      if ($this->sortOrder == 1) {
        krsort($this->collectionArray);
      } else {
        ksort($this->collectionArray);
      }
    }
  }

  public static function fromUnsorted(Collection $collection, $sort)
  {
    $sortedCollection = new ActualSortedCollection();
    $sortedCollection->setSort($sort);
    foreach ($collection->keys() as $key) {
      $sortedCollection->addItem( $collection->getItem($key), $key);
    }
    return ($sortedCollection);
    
    
  }

}
