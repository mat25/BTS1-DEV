<?php
require_once "../src/Auteur.php";
require_once "../src/Livre.php";
require_once "../src/Editeur.php";
require_once "../src/Categorie.php";

// Créer un livre
$auteur = new Auteur("toto","titi");
$editeur = new Editeur("Editeur3", "Besancon");
$categorie = new Categorie("SF");

$livre = new Livre("1584585gf4", "tests",12,new DateTime("01-01-2023"),$auteur,$editeur,$categorie);

// Afficher le nom de l'auteur du livre
echo $livre->getAuteur()->getNom();

// Afficher la categorie du livre
echo PHP_EOL;
echo $livre->getCategorie()->getNomCategorie();

// Afficher nom de l'editeur
echo PHP_EOL;
echo $livre->getEditeur()->getNom();

