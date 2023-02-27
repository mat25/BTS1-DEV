<?php
include_once "./donnees/films.php";
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
    <title>Liste des films</title>
</head>
<body>
    <h1>Page d'accueil</h1>

    <div class="card">
        <div class="card-header">
            <img class="card-img"  src="images/<?php echo $films[0]['affiche'] ?>"  alt="">
        </div>

        <div class="card-body">
            <span class="gras"><p class="card-title"> <?php echo $films[0]['titre'] ?> </p></span>
            <p> <span class="card-year"> <i class="fa-solid fa-calendar-days"></i> <?php echo $films[0]['annee'] ?></span> <span class="card-time"><i class="fa-regular fa-clock"></i><?php echo convertirDuree($films[0]['duree']) ?></span></p>
            <br>
            <p> <span class="gras">Par </span><?php echo $films[0]['realisateur'] ?> </p>

            <div class="card-detail">
                <a href=""><p>Détails film</p></a>
            </div>
        </div>
    </div>
</body>
</html>