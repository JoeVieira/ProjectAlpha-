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

	public function getItem($key);
  {
    if($this->hasKey($key)){
      return this->collectionArray[$key];
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
}

class ActualSortedCollection extends ActualCollection implements SortedCollection {

  private $sortOrder;

	public function setSort($sort = SortedCollection::SORT_ASC)
  {
    $this->sortOrder = $sort; 
  }
	
	/**
	 * build a sorted collection from a non-sorted one of a compatabile type
	 *
	 * @param Collection $collection
	 * @param int $sort
	 * @return SortedCollection
	 */
	public static function fromUnsorted(Collection $collection, $sort)
  {
    if ($collection->count() < 2) {
       return ($collection);
    }
    
    $keysArray = $collection->keys();  
    if ($sortOrder == 1) {
      rsort($keysArray);
    } else {
      sort($keysArray);
    }
    foreach ($keysArray as $key) {
      $this->addItem( $collection->getItem($key), $key);
    }
    return ($this);
    
    
  }

}
