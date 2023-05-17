<?php

require_once "./src/modele/dao/AuteurDAO.php";
require_once "./src/modele/entites/Auteur.php";

$auteurDAO = new AuteurDao();

$auteur = new Auteur();
$auteur->setNom("Bernard");
$auteur->setPrenom("Denis");

$auteurDAO->create($auteur);