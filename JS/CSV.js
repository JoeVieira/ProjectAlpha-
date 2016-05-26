function compile_csv_search(csv, col) {
	var splitCSV = csv.split("\n"), header = splitCSV[0].split(","), keyIndex = 1, result = [];
	keyIndex = header.indexOf(col);
	splitCSV.shift();
	for(i = 0; i < splitCSV.length; i++) {
		var arr = splitCSV[i].split(","), temp = [];
		for (j = 0; j < arr.length; j++) {
			temp[header[j]] = arr[j];
		}
		result[arr[keyIndex]] = temp;
	}
	return function(name){
		return result[name];
	}
}