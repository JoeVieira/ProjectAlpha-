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

function CSVDB() {
    var args = Array.prototype.slice.call(arguments);
        this.rowDelim = ",";
        this.csv = args[0].split("\n");
        this.header = this.csv.slice(0,1)[0].split(this.rowDelim);
        this.primary = args.slice(args.length - 1);
        this.data = this.csv.slice(1, this.csv.length - 1);
        this.db = [];
}

CSVDB.prototype.process = function(){
    this.processCSV(this.data, this.header);
};

CSVDB.prototype.processCSV = function(data, header){
    for(var i = 0, len = data.length; i < len; i++){
        var row = data[i].split(this.rowDelim),
            obj = {};
        for(var j = 0, length = row.length; j < length; j++){
            obj[header[j]] = row[j];
        }
        this.db.push(obj);
    }
};

CSVDB.prototype.find = function(value){
    for(var i = 0, len = this.db.length; i < len; i++){
        var record = this.db[i];
        for(var key in record){
            if(record.hasOwnProperty(key)){
                if(record[key] === value){
                    return record;
                }
            }
        }
    }
};

CSVDB.prototype.findByProperty = function(value, property){
    for(var i = 0, len = this.db.length; i < len; i++){
        var record = this.db[i];
        if(record[property] === value){
            return record;
        }
    }
};

CSVDB.prototype.findByPrimary = function(value){
    return this.findByProperty(value, this.primary);
}

function compile_csv_search(data, primary){
    var csv = new CSVDB(data, primary);
    csv.process();
    return function(value){
        return csv.findByPrimary(value);
    }
}


var csv_by_name = compile_csv_search(
    "ip,name,desc\n"+
    "10.49.1.4,server1,Main Server\n"+
    "10.52.5.1,server2,Backup Server\n",
    "name");

console.log(csv_by_name("server2"));
console.log(csv_by_name("server9"));
