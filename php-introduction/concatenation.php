<?php


//Utilisation de l'opérateur de concatenation .

$prenom = "Louis";
echo "bonjour, je m'appelle " .$prenom ;
echo PHP_EOL ;

$prenom = "Pierre";
echo "bonjour, je m'appelle " .$prenom ;
echo PHP_EOL ;


// utilistation de l'interpolation
echo "bonjour, je m'appelle $prenom " ;
echo PHP_EOL ;
// marche pas avec les simple cotes
//echo 'bonjour, je m\'appelle $prenom ' ;



$age = 20 ;
//interpolation
echo "je m'appelle $prenom et j'ai $age ans" ;
echo PHP_EOL ;
//Concatenation
echo "je m'appelle " .$prenom ." et j'ai " .$age ." ans" ;