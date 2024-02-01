function reversestring (text) {
    // Your code here
    var splitString = text.split("");
    var reverseArray = splitString.reverse();
    var joinArray = reverseArray.join("");

    return joinArray;
}

// TEST CASES
console.log(reversestring('Hello World and Coders')); // sredoc dna dlrow olleH
console.log(reversestring('John Doe')); // eoD nhoJ
console.log(reversestring('I am a bookworm')); // rowkoob a ma I
console.log(reversestring('Coding is my hobby')); // ybboh ym si gnidoc
console.log(reversestring('Super')); // repus