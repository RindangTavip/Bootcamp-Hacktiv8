// lanjutkan dari exercise 7 (cek angka prima)
// buatlah function yang me return semua angka prima di antara 2 angka input

// cek bilangan prima
function isPrime (number) {
    var sqrtnum = Math.floor(Math.sqrt(number));
    var prime = number != 1;
    for(var i=2; i<sqrtnum+1; i++) {
        if(number % i == 0) {
            prime = false;
            break;
        }
    }
    return prime;
}

function listPrima(angkaPertama, angkaKedua) {
    //code disini
    let primes = [];
  
    for (let i = angkaPertama; i <= angkaKedua; i++) {
      if (isPrime(i)) {
        primes.push(i);
      }
    }
  
    return primes;
}

console.log(listPrima(1, 5)) // [2, 3, 5]
console.log(listPrima(5, 10)) // [5, 7]
console.log(listPrima(10, 20)) // [11, 13, 17, 19]