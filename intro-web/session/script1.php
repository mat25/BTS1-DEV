<?php
    // Créer une session
    // ATTENTION : 1ère instruction PHP
    session_start();

    // Stocker une valeur dans la session de l'utilisateur
    $_SESSION["utilisateur"]["prenom"] = "TOTO";
    $_SESSION["utilisateur"]["nom"] = "TUTU";
    $_SESSION["utilisateur"]["majeur"] = true;
    $_SESSION["panier"]["p1"] = "Produit 1";
    $_SESSION["panier"]["p2"] = "Produit 2";


    $_SESSION["utilisateur"];  // Infos sur les utilisateurs
    $_SESSION["panier"];  // Tous les articles
    // Supprimer de la session toute les infos lier a l'utilisateur
    unset($_SESSION["utilisateur"]);
    // Suprrimer le panier
    unset($_SESSION["panier"]);
    unset($_SESSION)
    ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creer une session</title>
</head>
<body>
    <h1>Session</h1>
    <p>Ce script permet de creer une nouvelle session</p>
</body>
</html>
