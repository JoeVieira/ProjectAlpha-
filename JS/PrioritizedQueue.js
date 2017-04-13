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

function ItemInQueue (data, priority) {
  this.data = data;
  this.priority = priority;
}

ItemInQueue.prototype.toString = () => {
  return this.priority
}

function PriorityQueue () {
  this.queue = [null];
}

PriorityQueue.prototype = {
  enq: function(data, priority) {
    var item = new ItemInQueue(data, priority);
    this.moveUp(this.queue.push(item) -1);
  },

  moveUp: function(i) {
    while (i > 1) {
      var parentIndex = i - 1;
      if (!this.isPriorityHigher(i, parentIndex)) break;
      this.swap(i, parentIndex);
      i = parentIndex;
    }   },

  deq: function() {
    return this.queue.pop().data;
  },

  swap: function(i,j) {
    var temp = this.queue[i];
    this.queue[i] = this.queue[j];
    this.queue[j] = temp;
  },

  isPriorityHigher: function(i,j) {
    return this.queue[i].priority < this.queue[j].priority;
  }
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