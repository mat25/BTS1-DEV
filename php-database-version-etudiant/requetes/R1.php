<?php

require_once "../base-de-donnees/tableArticle.php";
require_once "../base-de-donnees/tableAuteur.php";
require_once "../base-de-donnees/tableCategorie.php";
require_once "requetes.php";

/*
 * Test requête R1
*/
$resultats = rechercherArticlesActifs($tableArticles);
print_r($resultats);
