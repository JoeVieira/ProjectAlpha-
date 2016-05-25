/**
 * Created by vieiraj on 5/24/16.
 */

/*

 Problem statement
 =================
 Implement a Priority Queue. This should function like a normal queue, but allowing for retrieving the top priority item, rather than the first in.

 - Assume that features of the most recent language standard are available.
 - We expect good performance.
 - If missing more requirements details, just make reasonable assumptions of
 your own.


Example Usage:

 queue = new PriorityQueue();
 var dataObjectOne = {thing: "value"};
 var priorityOne = 1;
 var dataObjectTwo = {thing: "value2"};
 var priorityTwo = 2;
 queue.enq(dataObjectOne,priorityOne);
 queue.enq(dataObjectTwo,priorityTwo);

 var data = queue.deq();
 console.log(data);
    
Example output:
 {thing: "value2"}
*/
function PriorityQueue () {
  this._queue = [];
  this.size = 0;

  this.enq = function(obj, priority) {
    this._queue[++this.size] = {"obj":obj,"priority":priority};
    this.reheapify(this.size);
  };

  this.deq = function() {
    if (this.size != 0) {
      var el = this._queue[1].obj;
      this.exchange(1, this.size--);
      this._queue[this.size+1] = undefined;
      this.heapify(1);
      return el;
    }
  };

  this.heapify = function(k) {
    while (2*k <= this.size) {
      var j = 2*k;
      if (j < this.size && this.min(j, j+1)) 
        j++;
      if (!this.min(k, j))
        break;
      this.exchange(k, j);
      k = j;
    }
  }

  this.reheapify = function(k) {
    while (k > 1 && this.min(Math.floor(k/2), k)) {
        this.exchange(k, Math.floor(k/2));
        k = Math.floor(k/2);
    }
  };

  this.min = function(i, j) {
    return this._queue[i].priority < this._queue[j].priority;
  };

  this.exchange = function(i, j) {
    var temp = this._queue[i];
    this._queue[i] = this._queue[j];
    this._queue[j] = temp;
  };
}

queue = new PriorityQueue();
 var dataObjectOne = {thing: "value"};
 var priorityOne = 1;
 var dataObjectTwo = {thing: "value2"};
 var priorityTwo = 2;
 queue.enq(dataObjectOne,priorityOne);
 queue.enq(dataObjectTwo,priorityTwo);

 var data = queue.deq();
 console.log(data);