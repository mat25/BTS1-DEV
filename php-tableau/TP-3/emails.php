<?php

/*
$emails = ["durand.martin@free.fr","dupond.petit@free.fr","petit.bernard@laposte.net"];
$tableauNomAdresseMail = [];

//on recupere le nom est l'addresse mail de la personne pour le mettre dans un tableau associatif
foreach ($emails as $email) {
    $premierPoint = strpos($email,".");
    $arobase = strpos($email,"@");
    $nomPersonne = substr($email,$premierPoint+1,$arobase-$premierPoint-1);
    $tableauNomAdresseMail[$nomPersonne] = $email;
}
*/

$tableauNomAdresseMail = [
    "martin" => "durand.martin@free.fr" ,
    "petit" => "dupond.petit@gmail.com",
    "bernard" => "petit.bernard@laposte.net"
] ;


foreach ($tableauNomAdresseMail as $nom => $mail) {
    echo "$nom a $mail comme adresse mail";
    echo PHP_EOL;
}

$nomDeDomaineARechercher = readline("Veuillez indiquer un nom de domaine que vous voulez rechercher : ");
$noms = [];
foreach ($tableauNomAdresseMail as $nom => $mail) {
    if (str_contains($mail,$nomDeDomaineARechercher)==true) {
        $noms[] = $nom;  // ou
        //array_push($noms,$nom);
    }
}

echo "Il y a ".count($noms)."Utilisateur possedant le domaine $nomDeDomaineARechercher";

foreach ($noms as $nom) {
    echo $nom;
    echo PHP_EOL;
}

