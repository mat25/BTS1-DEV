<?php
$prenom = readline("saisir votre prenom : ");
$nom = readline("saisir votre nom : ");
$initiale = strtoupper(substr($prenom,0,1).substr($nom,0,1)) ;

echo $initiale;