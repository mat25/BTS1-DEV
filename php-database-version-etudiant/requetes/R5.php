<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";
require_once "requetes.php";

/*
 * Test requête R5
*/

$resultats = articleParOrdreAlphabetique($tableArticles,$tableCategories);
print_r($resultats);
