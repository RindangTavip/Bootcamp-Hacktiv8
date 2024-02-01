// membuat output yang urut a-z dari input text
function urutHuruf(text){
    // code disini
    return text.toLowerCase().split("").sort().join("");
}

// TEST CASES
console.log(urutHuruf("halo")); //ahlo
console.log(urutHuruf("qwerty")); //eqrtwy
console.log(urutHuruf("qwertyuiopasdfghjklzxcvbnm")); //abcdefghijklmnopqrstuvwxyz