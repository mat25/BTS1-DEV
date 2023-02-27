<?php

$coefa = readline("Saisir coefficient a : ");
$coefb = readline("Saisir coefficient b : ");
$coefc = readline("Saisir coefficient c : ");

echo "résolution de l'equation $coefa*x*2+$coefb*x+$coefc = 0" ;
echo PHP_EOL ;

$delta = $coefb **2 - 4 * $coefa * $coefc ;




if ($delta == 0) {
    echo "il y a 1 solution : ";
    $solution = -$coefb / (2 * $coefa );
    echo PHP_EOL ;
    echo "               $solution";
} elseif ($delta < 0 ) {
    echo "il n'y a aucune solution";
} else {
    $solution1 = (-$coefb - sqrt($delta)) / (2 * $coefa );
    $solution2 = (-$coefb + sqrt($delta)) / (2 * $coefa );
    echo "il y a 2 solutions : ";
    echo PHP_EOL ;
    echo "       x1 =  $solution1";
    echo PHP_EOL ;
    echo "       x2 =  $solution2";

}