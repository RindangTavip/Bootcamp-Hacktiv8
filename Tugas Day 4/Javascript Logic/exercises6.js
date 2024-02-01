function gcd (firstNumber, secondNumber) {
    // Your code here
    const findGCD = (a, b) => {
        while (b !== 0) {
            const temp = b;
            b = a % b;
            a = temp;
        }
        return a;
    };
    const firstNumberPositive = Math.abs(firstNumber);
    const secondNumberPositive = Math.abs(secondNumber);

    return findGCD(firstNumberPositive, secondNumberPositive);
}

// TEST CASES
console.log(gcd(12, 16)); // 4
console.log(gcd(50, 40)); // 10
console.log(gcd(22, 99)); // 11
console.log(gcd(24, 36)); // 12
console.log(gcd(17, 23)); // 1