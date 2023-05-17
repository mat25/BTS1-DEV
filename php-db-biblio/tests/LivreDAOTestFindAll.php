<?php
require_once "./src/modele/dao/LivreDAO.php";
require_once "./src/modele/entites/Livre.php";

$livreDAO = new LivreDAO();

$livres = $livreDAO->findAll();

foreach ($livres as $livre) {
    echo $livre->getTitre()." a ".$livre->getNbPages()." page. Ecrit par : ".
        $livre->getAuteur()->getPrenom()." ".
        $livre->getAuteur()->getNom()." le ".
        $livre->getDateParution()->format("d/m/Y");
    echo PHP_EOL;
}