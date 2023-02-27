<?php

require_once "../base-de-donnees/tableArticle.php";
require_once "../base-de-donnees/tableAuteur.php";
require_once "../base-de-donnees/tableCategorie.php";
require_once "requetes.php";

/*
 * Test requête R2
*/
$categorieId = readline("Saisir l'id d'une catégorie : ");
$resultats = demanderCategorie($tableArticles,$categorieId);
print_r($resultats);
