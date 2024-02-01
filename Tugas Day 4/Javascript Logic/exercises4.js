function isArithmeticProgression (number) {
    // Your code here
    if (number.length < 2) {
        return false;
    }

    const firstDifference = number[1] - number[0];

    for (let i = 2; i < number.length; i++) {
        if (number[i] - number[i - 1] !== firstDifference) {
            return false;
        }
    }

    return true;
}

// TEST CASES
console.log(isArithmeticProgression([1, 2, 3, 4, 5, 6])); // true
console.log(isArithmeticProgression([2, 4, 6, 12, 24])); // false
console.log(isArithmeticProgression([2, 4,6,8])); // true
console.log(isArithmeticProgression([2, 6, 18, 54])); // false
console.log(isArithmeticProgression([1, 2, 3, 4, 7, 9])); // false