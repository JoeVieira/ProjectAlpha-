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

function compile_csv_search(theCsvFile, keyword) { 
    this.csvArray = {};
    var linesArray = theCsvFile.split('\n');
    var headers = linesArray[0].split(',');
    for (var key in linesArray) {
        var i, row = {};
        var thisRowArray = linesArray[key].split(',');
        for(i =0; i < headers.length; i++) {
           row[headers[i]] = thisRowArray[i];
        }
        this.csvArray[row[keyword]] = row;
    }
   var searcher = function (columnName) {
       return JSON.stringify(this.csvArray[columnName]);      
       }
   searcher.csvArray = this.csvArray;
   return searcher;
}


var csv_by_name = compile_csv_search(
    "ip,name,desc\n"+
    "10.49.1.4,server1,Main Server\n"+
    "10.52.5.1,server2,Backup Server\n",
    "name");

console.log(csv_by_name("server2"));
console.log(csv_by_name("server9"));
