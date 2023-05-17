<?php

require_once "./src/modele/dao/AuteurDAO.php";
require_once "./src/modele/entites/Auteur.php";

$auteurDAO = new AuteurDao();

$auteur = $auteurDAO->findById(4);
$auteur->setNom("Adolphe");
$auteur->setPrenom("George");

$auteurDAO->update($auteur);