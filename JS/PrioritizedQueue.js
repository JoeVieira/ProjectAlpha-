/**
 * Created by vieiraj on 5/24/16.
 */

/*

 Problem statement
 =================
 Implement a Priority Queue. This should function like a normal queue, 
 but allowing for retrieving the top priority item, rather than the first in.

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


function PriorityQueue(){
	this.queue = [];
	this.sorted = false;
}

PriorityQueue.prototype.enq = function(data, priority){
	this.queue.push({ data: data, priority: priority});
	this.sorted = false;
}

PriorityQueue.prototype.sort = function(){
	this.queue.sort(this.sortCompare);
	this.sorted = true;
}

PriorityQueue.prototype.sortCompare = function(a, b){
	if(a.priority > b.priority){
		return 1;
	} else if(a.priority < b.priority){
		return -1;
	} else {
		return 0;
	}
}

PriorityQueue.prototype.deq = function(){
	if(!this.sorted){
		this.sort();
	}
	var obj = this.queue.pop();
	return obj.data;
}

 var queue = new PriorityQueue();

 queue.enq({ name: 'charlie'}, 0);
 queue.enq({ name: 'delta'}, 9);
 queue.enq({ name: 'alpha'}, 5);

 var data = queue.deq();
 console.log(data);

