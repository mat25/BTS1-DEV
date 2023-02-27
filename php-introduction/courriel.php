<?php

$prenom = readline("saisir votre prenom : ");
$nom = readline("saisir votre nom : ");
$nombre = strlen($nom);
$adresseEmail = $prenom.$nom.$nombre ;

echo "Votre adresse mail est $adresseEmail@societe.com";