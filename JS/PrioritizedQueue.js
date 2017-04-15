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

function PriorityQueue()
{
  this.objectArray = [];
  function compare(a,b) {
    if (a.priority < b.priority) return -1;
    if (a.priority > b.priority) return 1;
    return 0;
  }
  this.enq = function(dataObject, priority){
    this.objectArray.push({data: dataObject, priority: priority});
    this.objectArray.sort(compare);
  }
  this.deq = function(){
    var dataObject = this.objectArray.pop();
    return dataObject.data;
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
