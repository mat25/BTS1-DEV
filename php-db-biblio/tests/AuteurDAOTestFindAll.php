<?php

require_once "./src/modele/dao/AuteurDAO.php";
require_once "./src/modele/entites/Auteur.php";

$auteurDAO = new AuteurDao();
// Récuperer la liste des Auteurs
$auteurs = $auteurDAO->findAll();
foreach ($auteurs as $auteur) {
    echo $auteur->getPrenom().' '.$auteur->getNom();
    echo PHP_EOL;
}





