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

var PriorityQueue = function() {
	this.oldestIndex = 1;
	this.newestIndex = 1;
	this.storage = {};
	this.priority = {};
};

PriorityQueue.prototype.size = function() {
	return this.newestIndex - this.oldestIndex;
};

PriorityQueue.prototype.enq = function(data, priority) {
	this.storage[this.newestIndex] = data;
	this.priority[this.newestIndex] = priority;
	this.newestIndex++;
};

PriorityQueue.prototype.deq = function() {
	var highestPriority = 0,
		highestIndex = 0;
	
	for (i = this.oldestIndex; i < this.newestIndex; i++) {
		if (this.priority[i] > highestPriority) {
			highestPriority = this.priority[i];
			highestIndex = i;
		} else if (this.priority[i] == highestPriority && i > highestIndex) {
			highestPriority = this.priority[i];
			highestIndex = i;
		}
	}
	
	var oldestIndex = this.oldestIndex,
		deletedData = this.storage[highestIndex];
		
	delete this.storage[highestIndex];
	delete this.priority[highestIndex];
	
	this.oldestIndex++;
	
	return deletedData;
}


PriorityQueue.prototype.dequeue = function() {
	var oldestIndex = this.oldestIndex,
		deletedData = this.storage[oldestIndex];
		
	delete this.storage[oldestIndex];
	delete this.priority[oldestIndex];
	
	this.oldestIndex++;
	
	return deletedData;
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

