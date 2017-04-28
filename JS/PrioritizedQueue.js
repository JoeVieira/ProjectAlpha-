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

// PriorityQueue implementation and API based off of Algorithms 4th Edition by Sedgewick & Wayne
// http://algs4.cs.princeton.edu/24pq/
class Node {

	constructor(data, priority) {
		this.data = data;
		this.priority = priority;
	}

}
class PriorityQueue {

	constructor() {
		this.root = new Node(null, null);
	}

  // Insert an element into the PQ
	enqueue(element, priority) {
		if (this.root.priority == null) {
			this.root = new Node(element, priority);
		} else {
      
		}
	}

  // Remove the smallest element from the PQ
	dequeue() {

	}

  // Return the largest element
	max() {
		var max = 0;
    for (var i = 0; i < this.array.length; i++) {
    	if (this.array[i] != null && this.array[i] > max) {
    		max = this.array[i];
    	}
    }
    return max;
	}

  // Return and remove the largest element
	delMax() {
		largest_elt = this.max();
		largest_elt_index = this.array.indexOf(largest_elt);
		this.array[largest_elt_index] = null;

	}

  // Is the PQ empty?
	isEmpty() {
    return this.array.every(x => x == null);
	}

	// Number of elements in PQ
	size() {
    return this.array.length;
	}

	isNull(element) {
		return element == null;
	}

}

pq = new PriorityQueue;
console.log(pq.isEmpty());
pq.enqueue(5, 8);
console.log(pq.isEmpty());
console.log(pq.max());
console.log(pq.size());

