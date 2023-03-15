<?php
    session_start();

    if (!isset($_SESSION["panier"])) {
        // Création du panier
        $_SESSION["panier"] = [];
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if(isset($_POST["btn-modif"])) {
            $nom = $_POST["nom-produit"];
            $quantite = $_POST["quantite-produit"];
            $_SESSION["panier"][$nom]["quantite"] = $quantite;
        } elseif (isset($_POST["btn-suppr"])) {
            $nom = $_POST["nom-produit"];
            unset($_SESSION["panier"][$nom]);
        } elseif (isset($_POST["vider-panier"])) {
            foreach ($_SESSION["panier"] as $produit) {
                $nom = $produit["nom"];
                unset($_SESSION["panier"][$nom]);
            }
        }
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="panier.css">
    <title>Panier</title>
</head>
<body>
    <div class="container">
        <div class="titre">
            <h1>Votre Panier</h1>
        </div>
        <div class="table">
            <table class="blueTable">
                <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>total</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION["panier"] as $produit) {
                        $totalProduit = $produit["prix"] * $produit["quantite"];
                        $total += $totalProduit;
                        ?>
                        <tr>
                            <td><?= $produit["nom"]?></td>
                            <td><?= $produit["prix"]?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="nom-produit" value="<?= $produit["nom"]?>">
                                    <input type="number" name="quantite-produit" min="1" value="<?= $produit["quantite"]?>">
                                    <button type="submit" class="btn-modif" name="btn-modif">Modifier</button>
                                </form>
                                </td>
                            <td><?= $totalProduit?> €</td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="nom-produit" value="<?= $produit["nom"]?>">
                                    <button type="submit" class="btn-suppr" name="btn-suppr">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="3">
                            Total
                        </td>
                        <td><div class="total"><?= $total?> €</div></td>
                        <td>
                            <form method="post">
                                <button type="submit" class="btn-suppr" name="vider-panier">Vider panier</button>
                            </form>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="btn-retour-commande">
                <p><a href="index.php">Continuer mes achats</a></p>
                <p><a href="#">Passer ma commande</a></p>
            </div>
        </div>
    </div>
</body>
</html>