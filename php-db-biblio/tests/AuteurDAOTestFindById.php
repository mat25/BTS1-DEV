<?php

require_once "./src/modele/dao/AuteurDAO.php";
require_once "./src/modele/entites/Auteur.php";

$auteurDAO = new AuteurDao();

$auteur = $auteurDAO->FindById(4);
if (!empty($auteur)) {
    echo $auteur->getPrenom().' '.$auteur->getNom();
}