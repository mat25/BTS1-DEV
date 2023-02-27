<?php

/********************************************************************
 * Ce fichier PHP contient la liste des fonctions permettant de
 * simuler les requêtes dans la base de données
 *******************************************************************/

/* Requête R1
 * Récupérer les articles actifs (articles à afficher)
 * On souhaite récupérer l'id, le titre, le contenu et la date de création de chaque article
*/
function rechercherArticlesActifs(array $tableArticles) : array {
    $resultats = [];
    foreach ($tableArticles as $id => $cle) {
        if ($cle["actif"] == true) {
            $resultats[] = [
                "id" => $id ,
                "titre" => $cle["titre"],
                "contenu" => $cle["contenu"],
                "date_creation" => $cle["date_creation"]
            ];
        }
    }
    return $resultats;
}

/* Requête R2
 * Récupérer les articles d'une catégorie donnée
 * On souhaite récupérer l'id, le titre, le contenu et la date de création de chaque article
*/
// PLACER ICI VOTRE FONCTION
function demanderCategorie(array $tableArticles,int $categorieId) : array {
    $resultats = [];
    foreach ($tableArticles as $id => $cle) {
        if ($cle["id_categorie"] == $categorieId) {
            $resultats[] = ["id" => $id ,
                "titre" => $cle["titre"],
                "contenu" => $cle["contenu"],
                "date_creation" => $cle["date_creation"]
            ];
        }
    }
    return $resultats;
}

/* Requête R3
 * Récupérer l'ensemble des articles
 * On souhaite récupérer l'id, le titre, le contenu, la date de création et le nom de la catégorie de chaque article
SELECT id,titre,contenu,date_creation,nom_categorie
FROM tableArticle, tabcategorie
*/
// PLACER ICI VOTRE FONCTION


function ensembleDesArticle(array $tableCategories,array $tableArticles) : array {
    $resultats = [];
    foreach ($tableArticles as $id => $cle) {
        $nomCategorie = $tableCategories[$cle["id_categorie"]]["libelle"];

        $resultats[] = ["id" => $id ,
            "titre" => $cle["titre"],
            "contenu" => $cle["contenu"],
            "date_creation" => $cle["date_creation"],
            "nomCategorie" => $nomCategorie
        ];

    }
    return $resultats;
}


/* Requête R4
 * Récupérer les articles dont la date de création est supérieure à une date donnée
 * On souhaite récupérer l'id, le titre, le contenu, la date de création, le prénom et le nom de l'auteur de
 * chaque article
*/
// PLACER ICI VOTRE FONCTION
function articlesDepuisDate(array $tableArticles,array $tableAuteurs,string $dateCreation) : array {
    $resultats = [];
    $dateCreation = str_replace("/","-",$dateCreation);

    foreach ($tableArticles as $id => $cle) {
        $dateCreaArticle = strtotime($cle["date_creation"]);
        $dateCreaDonne = strtotime($dateCreation);
        if ($dateCreaArticle > $dateCreaDonne) {
            $nom = $tableAuteurs[$cle["id_auteur"]]["nom"];
            $prenom = $tableAuteurs[$cle["id_auteur"]]["prenom"];
            }


            $resultats[] = ["id" => $id ,
                "titre" => $cle["titre"],
                "contenu" => $cle["contenu"],
                "date_creation" => $cle["date_creation"],
                "nom" => $nom,
                "prenom" => $prenom
            ];
        }
    return $resultats;

}




/* Requête R5
 * Récupérer les articles à afficher ordonnés sur le titre (ordre alphabétique)
 * On souhaite récupérer l'id, le titre, la date de création et le libellé de la catégorie de chaque article
*/
// PLACER ICI VOTRE FONCTION

function articleParOrdreAlphabetique(array $tableArticles,array $tableCategories) : array {

    $resultats = [];
    foreach ($tableArticles as $id=> $cle) {

        $libeller = $tableCategories[$cle["id_categorie"]]["libelle"];

        $resultats[] = ["id" => $id,
            "titre" => $cle["titre"],
            "date_creation" => $cle["date_creation"],
            "libelle" => $libeller
        ];

    }
    // Tri du tableau par ordre alphabetique
    $columns = array_column($resultats, 'titre');
    array_multisort($columns, SORT_ASC,SORT_STRING | SORT_FLAG_CASE, $resultats);

    return $resultats;

}



/* Requête R6
 * Récupérer le nombre d'articles postés par un auteur donné (id_auteur)
*/
// PLACER ICI VOTRE FONCTION
function nbArticleParAuteur(array $tableArticles,string $auteurId) : integer {
    $nbArticle = 0;
    foreach ($tableArticles as $id => $cle) {
        if ($cle["id_auteur"] == $auteurId) {
            $nbArticle += 1;
        }
    }
    return $nbArticle;
}




/* Requête R7
 * Récupérer le nombre d'articles postés par chaque auteur
 * On souhaite récupérer l'id, le prénom, le nom et le nombre d'articles ce chaque auteur
*/
// PLACER ICI VOTRE FONCTION
function nbArticlePourToutAuteur(array $tableArticles,array $tableAuteurs) : array {
    $resultats = [];
    foreach ($tableArticles as $id => $cle) {
        $nom = $tableAuteurs[$cle["id_auteur"]]["nom"];
        $prenom = $tableAuteurs[$cle["id_auteur"]]["prenom"];

        $nomResultat = array_column($resultats,'nom');
        if (in_array($nom,$nomResultat)) {
            $resultats[$nom]["nb_article"] += 1;
        } else {
            $resultats [$nom] = [
                "id" => $id,
                "prenom" => $prenom,
                "nom" => $nom,
                "nb_article" => 1
            ];
        }
    }
    return $resultats;
}


