<?php

$prenom = "Lucas";
//*************************************
// Définition des fonctions
//*************************************

//Fonction qui affiche bonjour
function direBonjour() : void {
    global $prenom;
    echo "bonjour ! $prenom";
    echo PHP_EOL;
}


// fonction parametrer qui affiche "bonjour prenom"
function direBonjourPrenom(string $prenom) : void  {
    echo "Bonjour $prenom !";
    echo PHP_EOL;
}

//*************************************
// Utilisation de la fonction
//*************************************

direBonjour();

direBonjourPrenom($prenom);

