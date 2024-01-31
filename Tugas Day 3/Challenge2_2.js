for (var i = 1; i <= 100; i++) {
    if(i % 2 == 0) {
        console.log("");
    }
    else {
        var j = 1;
        var O = "";

        while (j <= 100) {
            O += "O";
            j++;
        }
        console.log(O);
    }
}