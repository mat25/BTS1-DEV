<?php
    include_once "films.php";
    include_once "fonctions.php";

    $id = null;
    $erreur = null;
    if (!empty($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        $erreur = "L'URL n'est pas valide";
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style-details_film.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Détails film</title>
</head>
<body>
<?php

if (isset($erreur) ) { ?>
    <div class="erreur">
        <h2>Erreur</h2>
        <p><?= $erreur?></p>
    </div>
<?php } else { ?>
    <?php
    $film = rechercherFilmParID($filmsTable,$id);
    if (is_null($film)) { ?>
        <h2>Erreur</h2>
        <p>Le detail de ce film n'a pas été trouver</p>
    <?php } else { ?>
        <h1>Détails du film</h1>
        <img src="./images/<?= $film['affiche'] ?>" alt="affiche">
        <div class="texte">
            <h2><?= $film["titre"]." (".$film["annee"].")"?></h2>
            <p><i class="fa-regular fa-clock">&nbsp</i><?= convertirDuree($film['duree'])?></p>
            <p><?= "Réalisateur : ".$film['realisateur']?></p>
            <p><?= "Synopsis : ".$film['synopsis']?></p>
            <p><?php echo "Acteurs principaux : ";
            for ($i=0;$i<=count($film['acteurs'])-2;$i++) {
                echo $film['acteurs'][$i].", ";
            }
            echo $film['acteurs'][count($film['acteurs'])-1];

                ?></p>
        </div>
    <?php } ?>
<?php } ?>

</body>
</html>
