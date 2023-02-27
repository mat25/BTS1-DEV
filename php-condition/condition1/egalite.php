<?php

/*
demander a l'utilisateur de saisir 2 nombre et d'afficher si ces 2 nombre sont egaux ou differents
*/


$nombre1 = readline("donner un nombre : ");
$nombre2 = readline("donner un autre nombre : ");

//on montre que ca renvoie une valeur booleen
$resultat = $nombre1 == $nombre2 ;
var_dump($resultat) ;


// L'operateur == permet de tester l"egalité
if ($nombre1 == $nombre2) {
    echo "Les 2 nombres sont egaux !" ;
} else { 
    echo "Les 2 nombres sont differents !" ;
}