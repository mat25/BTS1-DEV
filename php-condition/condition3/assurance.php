<?php
$age = readline("Saisir votre age : ");
$sexe = readline("saisir votre sexe (M ou F) : ");

$estHommePlus22Ans = $age>22 && $sexe == "M" ;
$estFemmeEntre20Et30Ans = $age>=22 && $age<=30 && $sexe=="F" ;

if ( $estHommePlus22Ans || $estFemmeEntre20Et30Ans ) {
    echo "la surprime s'applique ";
} else {
    echo "la surprime ne s'applique pas";
}