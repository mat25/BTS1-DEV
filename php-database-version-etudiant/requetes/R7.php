<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";
require_once "requetes.php";

/*
 * Test requête R7
*/

$resultats = nbArticlePourToutAuteur($tableArticles,$tableAuteurs);
print_r($resultats);