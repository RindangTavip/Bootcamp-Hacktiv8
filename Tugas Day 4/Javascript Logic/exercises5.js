function threestepsAB (text) {
    // Your code here
    for (let i = 0; i < text.length - 4; i++) {
        if (text[i] === 'a' && text[i + 4] === 'b') {
          return true;
        }
        else if (text[i] === 'b' && text[i + 4] === 'a') {
          return true;
        }
    }
  
    return false;
}

// TEST CASES
console.log(threestepsAB('lane borrowed')); // true
console.log(threestepsAB('i am sick')); // false
console.log(threestepsAB('you are boring')); // true
console.log(threestepsAB('barbarian')); // true
console.log(threestepsAB('bacon and meat')); // true