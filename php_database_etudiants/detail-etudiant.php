<?php
session_start();
require_once './src/utils/dates.php';
require_once "./src/modele/promotiondb.php";



$id = null;
$page=null;
$erreur = null;
if (!empty($_GET["id"])) {
    // Le parametre existe
    $id=$_GET["id"];
} else {
    // Le paramettre n'existe pas ou ets vide
    $erreur = "L'URL n'est pas valide !";
}
require_once './src/modele/etudiantDB.php';
$etudiant = selectStudentByID($id);

if (empty($_GET["page"])) {
    $erreur = "L'URL n'est pas valide !";
} elseif ($_GET["page"] != "LP" && $_GET["page"] != "LE"){
    $erreur = "L'URL n'est pas valide !";
} else {
    $page = $_GET["page"];
}


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Detail de l'etudiant</title>
</head>
<body>
<?php
if (isset($erreur) ) { ?>
    <div class="erreur">
        <h2>Erreur</h2>
        <p><?= $erreur?></p>
    </div>
<?php } else { ?>
    <div class="container">
        <navigation class="navigation ">
            <div class="logo">
                <a href="index.php"><img src="image/logo.png" alt="logo de l'ecole"></a>
            </div>
            <div class="liste_etudiant">
                <p><a href="index.php">Listes etudiants</a></p>
            </div>
            <div class="liste_formation">
                <p><a href="liste_promotion.php">Listes formations</a></p>
            </div>
            <div class="liste_demande_contact">
                <p><a href="liste_demande_contact.php">Listes contacts</a></p>
            </div>
            <div class="nouvelle-etudiant">
                <p><a href="new_student.php">Nouvel Etudiant</a></p>
            </div>
            <div class="contact">
                <p><a href="contact.php">Contact</a></p>
            </div>
            <div class="sign_up">
                <?php
                if (!isset($_SESSION['connexion']['id'])) { ?>
                    <p><a href="sign_in.php">Connexion</a></p>
                <?php } else { ?>
                    <form action="sign_in.php" method="post" class="deconnexion">
                        <input type="submit" name="deconnexion" value="Deconnexion">
                    </form>
                <?php } ?>

            </div>
        </navigation>

        <header class="header">
            <?php
            if (isset($_SESSION['connexion']['id'])) { ?>
                <div class="page_perso">
                    <p>bonjour, <?= $_SESSION['connexion']['prenom']." ".$_SESSION['connexion']['nom']?></p>
                </div>
            <?php } ?>
            <?php
            if ($page == "LE") { ?>
                <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
            <?php } else { ?>
                <a href="liste_promotion.php"><i class="fa-solid fa-arrow-left"></i></a>
            <?php } ?>
            <h1><?= ucfirst($etudiant["prenom_etudiant"])?> <?=strtoupper($etudiant["nom_etudiant"])?></h1>
        </header>


        <div class="contain_details">
            <div class="photo_details_etudiants">
                <img src="image/<?= $etudiant["photo_etudiant"]?>" alt="photo de <?= $etudiant["prenom_etudiant"]." ".$etudiant["nom_etudiant"]?>">
            </div>
            <div>
                <h1>Informations personnelles</h1>
                <p>
                    <?php
                    $timestamp = strtotime($etudiant["date_naissance_etudiant"]);
                    $date = date("d\ m\ Y",$timestamp);
                    ?>
                    <i class="fa-solid fa-calendar-days"> </i>
                    <?=formatDate($etudiant["date_naissance_etudiant"])?>
                </p>
                <p>
                    <i class="fa-solid fa-location-dot"></i>
                    <?= $etudiant["adresse_etudiant"]?>
                </p>
                    <?php
                    $age = caclulAge($etudiant["date_naissance_etudiant"]) ; ?>
                    <p>
                        <i class="fa-solid fa-cake-candles"></i>
                        <?= $age." ans"?>
                    </p>
                <h1></h1>

                <h1>Affectation</h1>
                <?php
                if (empty($etudiant["id_promotion"])) { ?>
                    <p>Aucune promotion n'a été choise</p>
                <?php } else {
                    $promotion = selectPromotionByID($etudiant["id_promotion"]);
                    ?>
                    <p><i class="fa-sharp fa-solid fa-graduation-cap"></i>
                    <?= $promotion["intitule_promotion"]?></p>
                <?php } ?>

                <h1>Coordonnées</h1>
                <p>
                    <i class="fa-solid fa-mobile"></i>
                    <?= $etudiant["telephone_etudiant"]?>
                </p>
                <p>
                    <i class="fa-solid fa-envelope"></i>
                    <?= $etudiant["email_etudiant"]?>
                </p>
            </div>
        </div>
        <footer class="footer">
            <p>Copyright © 2000-2023 Best Students Inc. Tous droits réservés</p>
        </footer>
    </div>
<?php } ?>
</body>
</html>
