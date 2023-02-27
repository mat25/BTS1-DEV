<?php

// commentaire
/* 
Commentaire multiligne 
*/

// Déclarer une variable contenant un prenom
$prenomUtilisateur = "Louis" ; 
echo $prenomUtilisateur ;
echo PHP_EOL ;
//modifier le contenu de la variable $prenomUtilisateur
$prenomUtilisateur = "Pierre" ;
echo $prenomUtilisateur ;
echo PHP_EOL ;


//information sur la variable (type, nb de caractere, puis sa valeur)
var_dump($prenomUtilisateur) ;
echo PHP_EOL ;

//change de type
$prenomUtilisateur = 10;
var_dump($prenomUtilisateur) ;

//change de type
$prenomUtilisateur = 10.78;
var_dump($prenomUtilisateur) ;

/*
chaine = string
entier = int
réel = float
booléen = bool(True, False)
*/


