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

class PriorityQueue {
  constructor () {
      this.queue = {};
  }

  enq (object, priority) {
    let array = this.queue[priority] || [];
    array.push(object);
    this.queue[priority] = array;
  }

  deq () {
    let returnValue;
    let queueKeys = Object.keys(this.queue).sort().reverse();

    if (queueKeys.length > 0) {
      let priorityArray = this.queue[queueKeys[0]];
      returnValue = priorityArray.pop();
      if (priorityArray.length === 0) {
        delete this.queue[queueKeys[0]];
      }
    }
    
    return returnValue;
  }
}

 var queue = new PriorityQueue();
 var dataObjectOne = {thing: "value"};
 var priorityOne = 1;
 var dataObjectTwo = {thing: "value2"};
 var priorityTwo = 2;
 queue.enq(dataObjectOne,priorityOne);
 queue.enq(dataObjectTwo,priorityTwo);

 var data = queue.deq();
 console.log(data);
 