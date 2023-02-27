
<?php

$capital= readline("saisir montant à emprunter : ");
$taux= readline("saisir taux d'intérêt annuel  : ");
$duree= readline("saisir durée en année  : ");
 
$taux = $taux /100;
$dureeMois = $duree * 12 ;

$mensualite = ( $capital*($taux/12) ) / ( 1-(1+($taux/12))**-$dureeMois) ;

$mensualite = round($mensualite,2) ;

$coutTotal = round((($mensualite * 12 * $duree)-$capital),0);


echo "le cout de l'emprunt est de $mensualite euros $coutTotal euros" ;

 

