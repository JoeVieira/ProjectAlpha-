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

function PriorityQueue() {
    this.queue = [];
    this.enq = function(value, priority) {
        this.queue.push([value, priority]);
    };
    this.deq = function() {
        var itemIdx = 0;
        var highPriority = this.queue[0][1];

        for (var idx = 0; idx < this.queue.length; idx++) {
            if (this.queue[idx][1] < highPriority) {
                itemIdx = idx;
                highPriority = this.queue[idx][1];
            }
        }

        this.queue.splice(itemIdx, 1);
    };
    this.print = function() {
        var result = this.queue.map(function(item) {
            return item[0];
        });

        console.log(result);
    };
}

var queue = new PriorityQueue();
var dataObjectOne = { thing: "value" };
var priorityOne = 1;
var dataObjectTwo = { thing: "value2" };
var priorityTwo = 2;
var dataObjectThree = { thing: "value3" };
var priorityThree = 3;

queue.enq(dataObjectOne, priorityOne);
queue.enq(dataObjectTwo, priorityTwo);
queue.enq(dataObjectThree, priorityThree);

queue.deq();

queue.print();
