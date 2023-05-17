<?php

require_once "./src/modele/dao/AuteurDAO.php";
require_once "./src/modele/entites/Auteur.php";

$auteurDAO = new AuteurDao();

$auteurDAO->delete(16);