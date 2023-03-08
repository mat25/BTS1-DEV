<?php
session_start();
$panier = $_SESSION["panier"];
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panier</title>
</head>
<body>
    <h1>Mon panier</h1>
    <?php
    $totalPanier = 0;
        foreach ($panier as $produit) {?>
                <p><?=$produit["nom"]." ".$produit["prix"]." ".$produit["quantité"]?></p>
        <?php
        $totalPanier += $produit["prix"] * $produit["quantité"];
        } ?>
    <p><?= $totalPanier?></p>
</body>
</html>