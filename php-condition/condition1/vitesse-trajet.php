<?php
// differente variable de couleur
$fondRouge = "\033[41m";
$texteRouge = "\033[31m";
$fondVert = "\033[42m";
$normal = "\033[0m";


$distance = readline("saisir votre distance (en kms) : ") ;
$duree = readline("saisir votre durée (format h:mn) : ") ;

//prend tout avant les 2 points
$heure = strstr($duree, ":",true) ; 
//prend tout aprés les 2 points
$minute = substr(strstr($duree, ":"),1);


if (($heure >= 0) and ($minute >= 0 and $minute <60) ) {
    
    $vitesseEnKmh = $distance / ($heure + ($minute /60)) ;
    $vitesseEnKmh = ceil($vitesseEnKmh) ; // arrondi la valeur en desous


    echo "la vitesse moyenne du trajet est de $vitesseEnKmh Km/h" ;
    echo PHP_EOL ;


    if ($vitesseEnKmh <= 90) {
        echo $fondVert."Vous etes en dessous de 90 Km/h".$normal ;
    } else {
        echo $fondRouge."Vous etes au dessus de 90 Km/h".$normal ;
    }

}else {
    echo $texteRouge."valeur de duree $duree impossible !".$normal ;
}



