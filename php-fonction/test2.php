<?php


// Fonction qui additionne 2 nombres
function additionner(int $nb1,int $nb2) : int {
    //variable locale
    /*$resultat = $nb1 + $nb2;
    return $resultat;*/

    return $nb1 + $nb2;
}




// Appeler la fonction

$resultat=additionner(12,15);
echo "le resultat est egal a $resultat";

echo PHP_EOL;

echo "Le résultat est égal a ".additionner(12,15);