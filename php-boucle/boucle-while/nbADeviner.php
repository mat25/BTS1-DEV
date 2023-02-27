<?php

$nombreATrouver = rand(0,100);
echo $nombreATrouver;
echo PHP_EOL ;
$nbDeUtilisateur = -1;
$nbDeTentative = 0;
$nbDeTentativeMax = readline("Veuillez entrer le nombre d'essaie max : ") ;


while ($nombreATrouver <> $nbDeUtilisateur && $nbDeTentative < $nbDeTentativeMax) {
    $nbDeUtilisateur = readline("Veuillez saisir un nombre : ") ;
    $nbDeTentative += 1;    #incrementation
    
    if ($nombreATrouver > $nbDeUtilisateur){
        echo "le nombre a trouver est superieur a $nbDeUtilisateur" ;
        echo PHP_EOL ;
    } elseif ($nombreATrouver < $nbDeUtilisateur) {
        echo "le nombre a trouver est inferieur a $nbDeUtilisateur" ;
        echo PHP_EOL ;
    } else {
        echo "bravo vous avez trouver le nombre avec $nbDeTentative tentative" ;
    }

    if ($nbDeTentative >= $nbDeTentativeMax) {
        echo "nb de tentative max atteint, le nombre étais $nombreATrouver !" ;
        echo PHP_EOL ;
        echo "tu es NUL";
    } 
}
