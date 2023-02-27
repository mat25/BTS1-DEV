<?php

function retournerIdentite(string $prenom,string $nom) : string {
    $prenom = ucfirst(strtolower($prenom));
    $nom = strtoupper($nom);
    return $prenom." ".$nom;
}

//appel
$prenom = readline("Sasir votre prenom : ");
$nom = readline("sasir votre nom : ");

echo retournerIdentite($prenom,$nom);

