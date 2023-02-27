<?php
include_once "films.php";
include_once "fonctions.php";

$films = rechercherFilms($filmsTable);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<h1>Page accueil</h1>
<div class="container">
    <?php
    foreach ($films as $film) { ?>
        <div class="card">
            <div class="card-affiche">
                <img src="./images/<?= $film['affiche'] ?>" alt="affiche">
            </div>
            <div class="card-body">
                <div class="card-titre">
                    <p><?= $film['titre'] ?></p>
                </div>
                <div class="card-infos">
                    <div class="annee">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span><?= $film['annee'] ?></span>
                    </div>
                    <div class="duree">
                        <i class="fa-regular fa-clock"></i>
                        <span><?= convertirDuree($film['duree'])?></span>
                    </div>
                </div>
                <div class="card-realisateur">
                    <p><span>Par </span> <?= $film['realisateur']?></p>
                </div>
            </div>
            <div class="footer">
                <a href="details-film.php?id=<?=$film["id"]?>">Détails film</a>
            </div>
        </div>
    <?php } ?>
</div>
</body>
</html>