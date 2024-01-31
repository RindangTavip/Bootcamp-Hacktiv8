var numberArray = [1, 25, 11, 13, 31, 7];
//Ascending
var sortAscending = numberArray.sort(function(a, b) {
    return a - b
});
console.log(sortAscending);

//Descending
var sortDescending = numberArray.sort(function(a, b) {
    return b - a
});
console.log(sortDescending);