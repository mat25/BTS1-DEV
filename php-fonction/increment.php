<?php


// Fonction qui incrémente un nombre


function incrementer(int $nombre) : int {
    $nombre +=1;
    return $nombre;
}


function incrementer2(int& $nombre) : void {
    $nombre += 1;
}


// Appel
$compteur = 0;
$compteur = incrementer($compteur);
echo $compteur;

echo PHP_EOL;

$compteur2 = 0;
incrementer2($compteur2);
echo $compteur2;
