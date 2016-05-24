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
class CSVSearch {
    compile_csv_search (csvString) {
        let lines = csvString.split("\n");
        this.fields = {};
        this.fields = lines.map((line) => {
            if (line.length > 0) {
                let splitLine = line.split(",");
                let object = {};
                object.ip = splitLine[0];
                object.name = splitLine[1];
                object.desc = splitLine[2];

                return object;
            }
        });

        this.fieldsLength = this.fields.length;
    }

    csv_by_name (key) {
        for (let i = 0; i <= this.fieldsLength; i++) {
            if (this.fields[i] && this.fields[i].name && this.fields[i].name === key) {
                return this.fields[i]; 
            }
        }
    }
}

var csvSearch = new CSVSearch();
csvSearch.compile_csv_search(
    "ip,name,desc\n"+
    "10.49.1.4,server1,Main Server\n"+
    "10.52.5.1,server2,Backup Server\n",
    "name");

console.log(csvSearch.csv_by_name("server2"));
console.log(csvSearch.csv_by_name("server9"));
