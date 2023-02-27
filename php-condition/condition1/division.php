<?php

$nombre1 = readline("Saisir un nombre entier : ");
$nombre2 = readline("Saisir un nombre entier : ");


if ($nombre2 == 0){
    echo "resultat impossible car on divise par 0" ;
} else {
    $resultat = round($nombre1 / $nombre2,2);
    echo "Le résultat de la division de $nombre1 par $nombre2 est $resultat" ;
}
