<?php

session_start() ;


    // tableaus des produits
    $produits = [
        'p1' => ['nom' => 'Produit 1', 'prix' => 10],
        'p2' => ['nom' => 'Produit 2', 'prix' => 20],
        'p3' => ['nom' => 'Produit 3', 'prix' => 30],
        'p4' => ['nom' => 'Produit 4', 'prix' => 40],
        'p5' => ['nom' => 'Produit 5', 'prix' => 50],
    ] ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperer l'id du produit ajouté
    $id = $_POST['produit-id'] ;

    // tester si le panier existe ou pas dans la session
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [] ;
    }
    if (!isset($_SESSION['panier'][$id])) {
            $_SESSION['panier'][$id]['nom'] = $produits[$id]['nom'] ;
            $_SESSION['panier'][$id]['prix'] = $produits[$id]['prix'] ;
            $_SESSION['panier'][$id]['quantité'] = 1;
    } else {
            $_SESSION['panier'][$id]['quantité'] += 1 ;
    }


    // tester si le produit à ajouter est déja présent dans le panier
    // si il est present, on incremente sa quantité
    // sinon on ajoute le produit dans le panier avec une quantité = 1

}



?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Liste des articles</title>
</head>
<body>
    <div class="grille">
        <div class="titre">
            <h1>Liste des produits</h1>
        </div>
        <p>Nom du produit</p>
        <p>Prix</p>
        <p></p>
            <?php
            foreach ($produits as $idProduit => $produit) { ?>
                <p><?= $produit['nom'] ?> </p>
                <p> <?= $produit['prix'] ?> € </p>
                <form action="" method="post">
                    <input type="hidden" name="produit-id" value="<?= $idProduit?>">
                    <button type="submit" >Ajouter produit</button>
                </form>
            <?php } ?>
        <div class="valider">
            <a href="panier.php">Visualiser le Panier</a>
        </div>
    </div>
</body>
</html>