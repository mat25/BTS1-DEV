<?php


/*demander a l'utilisateur de saisir
son prenom puis d'afficher la chaine "je m'appelle {prenom saisi}"
*/

/*

$demandePrenom = readline("veuiller indiquer votre prenom : ") ;
echo "je m'appelle $demandePrenom " ;
echo PHP_EOL ;

// le prenom dois etre afficher en majuscule

$demandePrenom = readline("veuiller indiquer votre prenom : ") ;

echo "je m'appelle " .strtoupper($demandePrenom) ;


// le prenom dois etre afficher en minuscule

$demandePrenom = readline("veuiller indiquer votre prenom : ") ;

echo "je m'appelle " .strtolower($demandePrenom) ;
*/


// le prenom dois etre afficher en majuscule la premiere lettre

$demandePrenom = readline("veuiller indiquer votre prenom : ") ;

echo "je m'appelle " .ucfirst(strtolower($demandePrenom)) ;

echo substr($demandePrenom, 0,2) ;

