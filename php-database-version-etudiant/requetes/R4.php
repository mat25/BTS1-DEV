<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";
require_once "requetes.php";

/*
 * Test requête R4
*/
$dateCreation = readline("Saisir une date (dd/mm/yyyy) : ");
$resultats = articlesDepuisDate($tableArticles,$tableAuteurs,$dateCreation);
print_r($resultats);

