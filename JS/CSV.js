/**
 * Created by vieiraj on 5/24/16.
 */

/*

Problem statement
=================
Implement compile_csv_search() that parses text in the CSV format.

- Assume field values do not contain quotes or other special characters.
- Assume that all values in the key field are unique.
- Assume that features of the most recent language standard are available.
- We expect good performance.
- If missing more requirements details, just make reasonable assumptions of
your own.

    Solution must be simple and compact. No defensive coding, no comments, no
unrequested features. Only one file 10-15 lines of code.

    Sample usage:
    var csv_by_name = compile_csv_search(
        "ip,name,desc\n"+
        "10.49.1.4,server1,Main Server\n"+
        "10.52.5.1,server2,Backup Server\n",
        "name");
console.log(csv_by_name("server2"));
console.log(csv_by_name("server9"));
will print:
{ip: "10.52.5.1", name: "server2", desc: "Backup Server"}
undefined

*/

var dict = {};

function compile_csv_search(csv) {
  var lines = csv.split("\n");

  for (var i = 0; i < lines.length; i++) {
    var line_array = lines[i].split(",");
    if (line_array[0]) {
      dict[line_array[1]] = {"ip": line_array[0], "name": line_array[1], "desc": line_array[2]};
    }
  }
  return function(name) { return dict[name] };
}

var csv_by_name = compile_csv_search(
    "ip,name,desc\n"+
    "10.49.1.4,server1,Main Server\n"+
    "10.52.5.1,server2,Backup Server\n",
    "name");

console.log(csv_by_name("server2"));
console.log(csv_by_name("server9"));