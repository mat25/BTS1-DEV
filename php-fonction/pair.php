<?php

function estPair(int $nb) : bool {
    return $nb%2==0;
}

$nombreUtilisateur = readline("Ecriver un nombre : ");

if (estPair($nombreUtilisateur)) {
    echo "le nombre est pair";
} else {
    echo "le nombre est impair";
}
