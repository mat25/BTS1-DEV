<?php

require_once "fonctions.php";

$tableau = [12,15,16,55,44];
$tableau2 = ["tit","gergr","fsqfz"];

//tableau qui affiche les elements du tableau



//fonction qui prend un tableau en paramettre et qui retourne a tableau en résultat
function rechercherNombrePair(array $tableau) : array {
    $resultats = [];  //Variable local
    foreach ($tableau as $valeur) {
        if ($valeur % 2 == 0) {
            $resultats[] = $valeur;
        }
    }
    return $resultats;
}


// Fonction qui double les valeurs d'un tableau
function doublerValeursTableau(array& $tableau) : void {

    /*for ($i=0;$i<count($tableau);$i++){
        $tableau[$i] *= 2;
    }*/

    foreach ($tableau as $index=>$valeur) {
        $tableau[$index] = $valeur * 2;
    }
}

//appel
afficherTableau($tableau);
afficherTableau($tableau2);

afficherTableau(rechercherNombrePair($tableau));

doublerValeursTableau($tableau);
afficherTableau($tableau);

