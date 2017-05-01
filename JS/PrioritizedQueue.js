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

// Assumptions made:
// - priority is always an int
// - dequeue will always dequeue the object with the highest priority

class PriorityQueue {

	constructor() {
		this.dict = {};
	}

	enq(object, priority) {
		this.dict[priority] = object;
	}

	deq() {
		if (Object.keys.length === 0) {
			return null;

		} else {
			var keys = Object.keys(this.dict);
			var max = keys[keys.length - 1];
			var return_val = this.dict[max];
			delete(this.dict[max]);
			return return_val;
		}
	}

}

/*
queue = new PriorityQueue();
var dataObjectOne = {thing: "value"};
var priorityOne = 1;
var dataObjectTwo = {thing: "value2"};
var priorityTwo = 2;
queue.enq(dataObjectOne,priorityOne);
queue.enq(dataObjectTwo,priorityTwo);
console.log("Enqueueing objects");
console.log(queue);
console.log("\n");

console.log("Dequeueing an object");
var data = queue.deq();
console.log(data);
console.log(queue);
console.log("\n");

console.log("Enqueueing a bunch of object now");
queue.enq({thing: "value5"}, 5);
queue.enq({thing: "value17"}, 17);
queue.enq({thing: "value2"}, 2);
console.log(queue);
console.log("\n");

console.log("Dequeueing all objects added");
console.log("Removing...");
console.log(queue.deq());
console.log("Current queue");
console.log(queue);
console.log("\n");

console.log("Removing...");
console.log(queue.deq());
console.log("Current queue");
console.log(queue);
console.log("\n");

console.log("Removing...");
console.log(queue.deq());
console.log("Current queue");
console.log(queue);
console.log("\n");
*/
