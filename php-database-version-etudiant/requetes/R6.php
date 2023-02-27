<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";
require_once "requetes.php";

/*
 * Test requête R6
*/

$auteurId = readline("Saisir l'id d'un auteur : ");


$resultats = nbArticleParAuteur($tableArticles,$auteurId);
print_r($resultats);

