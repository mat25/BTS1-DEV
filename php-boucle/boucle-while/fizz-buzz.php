<?php

$nombreMin = readline("Saisir un nombre minimum : ") ;
$nombreMax = readline("Saisir un nombre maximum : ") ;

while ($nombreMin <= $nombreMax) {
    if ($nombreMin % 15 == 0) {
        echo "FizzBuzz" ;
    } elseif ($nombreMin % 5 == 0) {
        echo "Buzz" ;
    } elseif ($nombreMin % 3 == 0) {
        echo "Fizz" ;
    } else {
        echo $nombreMin ;
    }
    $nombreMin+=1 ;
    echo " " ;
}