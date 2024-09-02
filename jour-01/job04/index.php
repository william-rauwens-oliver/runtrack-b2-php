<?php

function my_fizz_buzz(int $length) : array {
    $result = [];

    for ($i = 1; $i <= $length; $i++) {
        // si $i est un multiple de 3 et 5
        if ($i % 3 === 0 && $i % 5 === 0) {
            $result[] = 'FizzBuzz';
        }
        // si $i est un multiple de 3
        elseif ($i % 3 === 0) {
            $result[] = 'Fizz';
        }
        // si $i est un multiple de 5
        elseif ($i % 5 === 0) {
            $result[] = 'Buzz';
        }
        else {
            $result[] = $i;
        }
    }

    return $result;
}

$result = my_fizz_buzz(15);

echo "Résultat de my_fizz_buzz(15) : ";
var_dump($result);

$expected = [1, 2, 'Fizz', 4, 'Buzz', 'Fizz', 7, 8, 'Fizz', 'Buzz', 11, 'Fizz', 13, 14, 'FizzBuzz'];

if ($result === $expected) {
    echo "fizz buzz ça marche.";
} else {
    echo "fizz buzz marche pas.";
    echo "\nRésultat obtenu : ";
    var_dump($result);
    echo "Résultat attendu : ";
    var_dump($expected);
}
?>