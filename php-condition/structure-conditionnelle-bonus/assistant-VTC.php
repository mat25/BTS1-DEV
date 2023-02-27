<?php

$pointDepart = readline("Point de départ : ");
$pointArrive = readline("Point d’arrivée : ");
$solde = readline("Votre solde : ");
$avoir = readline("Votre avoir : ");


//teste si l'avoir n'est pas superieur a 10€
if ($avoir > 10) {
    echo "Votre avoir ne peux pas etre superieur a 10€ " ;
}

//defini les 2 villes
$villeDepart = substr($pointDepart,strrpos($pointDepart," ")+1) ;
$villeArrive = substr($pointArrive,strrpos($pointArrive," ")+1) ;


//teste pour savoir si c'est un des 3 trajets proposé
$possibiliteTrajet=true ;
if ($villeDepart == "Paris" and $villeArrive == "Paris") {
    $prix = 30 ;
    $avoirAUtlise = 0 ;
} elseif ($villeDepart == "Paris" and $villeArrive <> "Paris") {
    $prix = 50 ;
    $avoirAUtlise = $avoir ;
} elseif ($villeDepart <> "Paris" and $villeArrive == "Paris") {
    $prix = 40 ;
    $avoirAUtlise = $avoir * 0.50 ;
} else {
    $possibiliteTrajet=false ;
    $prix = 0 ;
}


//affiche le prix que si le trajet est possible
if ($possibiliteTrajet) {
    echo "Trajet de $villeDepart vers $villeArrive pour un montant de $prix €" ;
    echo PHP_EOL ;
} else {
    echo "Trajet de $villeDepart vers $villeArrive" ;
    echo PHP_EOL ;
}




// affiche les differrente chose si le trajet et possible ou non 
if ($possibiliteTrajet == false) {
    echo "Désolé mais les trajets hors Paris ne sont pas proposés par notre société" ;
} elseif (($solde+$avoirAUtlise) < $prix) {
    echo "Désolé mais votre solde est insuffisant. Veuillez créditer votre solde" ;
} else {
    $solde = $solde+$avoirAUtlise - $prix ;
    $avoir = $avoir - $avoirAUtlise ;
    echo "Votre nouveau solde est de $solde € et votre nouvel avoir est de $avoir €" ;
}


