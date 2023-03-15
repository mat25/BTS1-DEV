<?php
    session_start();

    // Liste des produits
    $produits = [
            [   "nom" => "produit 1",
                "description" => "Déscription produit 1",
                "prix" => 19.99,
                "image" => "https://picsum.photos/id/10/300/200"
            ],
            [   "nom" => "produit 2",
                "description" => "Déscription produit 2",
                "prix" => 29.99,
                "image" => "https://picsum.photos/id/20/300/200"
            ],
            [   "nom" => "produit 3",
                "description" => "Déscription produit 3",
                "prix" => 39.99,
                "image" => "https://picsum.photos/id/30/300/200"
            ],
            [   "nom" => "produit 4",
                "description" => "Déscription produit 4",
                "prix" => 49.99,
                "image" => "https://picsum.photos/id/40/300/200"
            ],
            [   "nom" => "produit 5",
                "description" => "Déscription produit 5",
                "prix" => 59.99,
                "image" => "https://picsum.photos/id/50/300/200"
            ],
            [   "nom" => "produit 6",
                "description" => "Déscription produit 6",
                "prix" => 69.99,
                "image" => "https://picsum.photos/id/60/300/200"
            ],
            [   "nom" => "produit 7",
                "description" => "Déscription produit 7",
                "prix" => 79.99,
                "image" => "https://picsum.photos/id/70/300/200"
            ],
            [   "nom" => "produit 8",
                "description" => "Déscription produit 8",
                "prix" => 89.99,
                "image" => "https://picsum.photos/id/80/300/200"
            ],
    ];

    // Vérifier si le panier est présent ou pas dans la session
    if (!isset($_SESSION["panier"])) {
        // Création du panier
        $_SESSION["panier"] = [];
    }

    // Vérifier si l'ajout dans le panier a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérez le nom du produit et son prix
        $nomProduit = $_POST["nom-produit"];
        $prixProduit = $_POST["prix-produit"];
        // Tester si le produit est deja présent dans le panier
        // Structure du panier
        // $_SESSION["panier"]["nom-produit"]["quantité]
        // $_SESSION["panier"]["nom-produit"]["prix"]
        // $_SESSION["panier"]["nom-produit"]["nom-produit"]
        if (array_key_exists($nomProduit,$_SESSION["panier"])) {
            // Incrementer la quantité
            $_SESSION["panier"][$nomProduit]["quantite"] += 1;
        } else {
            // Creer la produit
            $produit = [
                    "nom" => $nomProduit,
                    "prix" => $prixProduit,
                    "quantite" => 1,
            ];
            // Ajouter le produit dans le panier
            $_SESSION["panier"][$nomProduit] = $produit;
        }
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <title>Liste produits</title>
</head>
<body>
    <div class="container">
        <h1>Liste des produits</h1>
        <div class="panier">
            <a href="panier.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
            <?php
            $compteur = 0;
            $total = 0;
            foreach ($_SESSION["panier"] as $produit) {
                $compteur +=1;
                $total+= $produit["prix"] * $produit["quantite"];
            }
            ?>
            <div class="popup-panier">
                <p><?= $compteur?> produit(s)</p>
                <p><?= $total?> €</p>
            </div>
        </div>
        <div class="produits">
            <?php
            foreach ($produits as $produit) { ?>
                <div class="carte">
                    <img src="<?= $produit["image"]?>" alt="image du produit">
                    <?php
                    if (isset($_SESSION["panier"][$produit["nom"]])) { ?>
                        <h2><?= $produit["nom"]?><i class="fa-solid fa-dragon"></i></h2>
                    <?php } else { ?>
                        <h2><?= $produit["nom"]?></h2>
                    <?php } ?>
                    <p class="description"><?= $produit["description"]?></p>
                    <p class="prix"><?= $produit["prix"]?></p>
                    <!-- Ajout du produit dans le panier  -->
                    <form action="" method="post">
                        <input type="hidden" name="nom-produit" value="<?= $produit["nom"]?>">
                        <input type="hidden" name="prix-produit" value="<?= $produit["prix"]?>">
                        <button type="submit" class="btn-ajout-panier">
                            <i class="fa-solid fa-cart-plus"></i>
                        </button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
