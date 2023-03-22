<?php
session_start();
require_once "./src/modele/etudiantDB.php";
require_once "./src/modele/promotiondb.php";
$promotions = selectAllpromotion();

$prenomEtudiant = null;
$nomEtudiant = null;
$emailEtudiant = null;
$dateNaissanceEtudiant = null;
$adresseEtudiant = null;
$telephoneEtudiant = null;
$erreurs = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty(trim($_POST["prenom_etudiant"]))) {
            $erreurs["prenom_etudiant"] = "Le prenom est obligatoire";
        } else {
            $prenomEtudiant = trim($_POST["prenom_etudiant"]);
        }

        if (empty(trim($_POST["nom_etudiant"]))) {
            $erreurs["nom_etudiant"] = "Le nom est obligatoire";
        } else {
            $nomEtudiant = trim($_POST["nom_etudiant"]);
        }

        if (empty(trim($_POST["email_etudiant"]))) {
            $erreurs["email_etudiant"] = "L'email est obligatoire";
        } elseif (!filter_var(trim($_POST["email_etudiant"]), FILTER_VALIDATE_EMAIL)) {
            $erreurs["email_etudiant"] = "L'email n'est pas valide";
        } else {
            $emailEtudiant = trim($_POST["email_etudiant"]);
        }

        if (empty(trim($_POST["date_naissance_etudiant"]))) {
            $erreurs["date_naissance_etudiant"] = "La date de naissance est obligatoire";
        } else {
            $dateNaissanceEtudiant = trim($_POST["date_naissance_etudiant"]);
        }

        if (empty(trim($_POST["adresse_etudiant"]))) {
            $erreurs["adresse_etudiant"] = "L'adresse est obligatoire";
        } else {
            $adresseEtudiant = trim($_POST["adresse_etudiant"]);
        }

        if (empty(trim($_POST["telephone_etudiant"]))) {
            $erreurs["telephone_etudiant"] = "Le telephone est obligatoire";
        } else {
            $telephoneEtudiant = trim($_POST["telephone_etudiant"]);
        }

        if ($_POST["promotion"] == "") {
            $promotion = false;
        } else {
            $promotion = $_POST["promotion"] ;
        }

        if (empty($_FILES["photo_etudiant"]["name"])) {
            $erreurs["photo_etudiant"] = "La photo est obligatoire";
        } else {
            // Récupere les infos liées a la photo
            $nomFichier = $_FILES["photo_etudiant"]["name"];
            $typeFichier = $_FILES["photo_etudiant"]["type"];
            $tmpFichier = $_FILES["photo_etudiant"]["tmp_name"];
            $tailleFichier = $_FILES["photo_etudiant"]["size"];
            $extensionFichier = pathinfo($nomFichier, PATHINFO_EXTENSION);

            if (!($typeFichier == "image/png" || $typeFichier == "image/jpeg")) {
                echo $typeFichier;
                $erreurs["photo_etudiant"] = "Seules les images de type .png et .jpeg sont accepter";
            } else {
                if ($tailleFichier > 600 * 1024) {
                    $erreurs["photo_etudiant"] = "L'image ne dois pas dépasser 600 Ko";
                } elseif (empty($erreurs)) {
                    $nomFichier = uniqid();
                    if (!move_uploaded_file($tmpFichier, "./image/$nomFichier.$extensionFichier")) {
                        $erreurs["photo_etudiant"] = "Un probleme interne est survenu .";
                    }
                }
            }
        }
        if (empty($erreurs)) {
            // Traitement des données saisies
            addStudent($prenomEtudiant,$nomEtudiant,$emailEtudiant,$dateNaissanceEtudiant,$adresseEtudiant,$telephoneEtudiant,$promotion,$nomFichier.".".$extensionFichier);
            // Renvoyer une réponse http au
            //navigateur lui demandant de lancer
            // une vouvelle requete HTTP vers accueil.php
            header("Location: index.php");
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
    <link rel="stylesheet" href="style.css">
    <title>Nouvelle etudiant</title>
</head>
<body>
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
        <h1>Ajout d'un nouvel éleve</h1>
    </header>

    <main class="contain">
        <form action="" method="post" enctype="multipart/form-data">

            <label for="prenom_etudiant">Prénom de l'étudiant*</label>
            <input type="text" id="prenom_etudiant" name="prenom_etudiant" value="<?= $prenomEtudiant?>">
            <?php
            if (isset($erreurs["prenom_etudiant"])) { ?>
                <p class="erreur-validation"><?= $erreurs["prenom_etudiant"] ?></p>
            <?php } ?>

            <label for="nom_etudiant">Nom de l'étudiant*</label>
            <input type="text" id="nom_etudiant" name="nom_etudiant" value="<?= $nomEtudiant?>">
            <?php
            if (isset($erreurs["nom_etudiant"])) { ?>
                <p class="erreur-validation"><?= $erreurs["nom_etudiant"] ?></p>
            <?php } ?>

            <label for="email_etudiant">Email de l'étudiant*</label>
            <input type="text" id="email_etudiant" name="email_etudiant" value="<?= $emailEtudiant?>">
            <?php
            if (isset($erreurs["email_etudiant"])) { ?>
                <p class="erreur-validation"><?= $erreurs["email_etudiant"] ?></p>
            <?php } ?>

            <label for="date_naissance_etudiant">Date de naissance de l'étudiant*</label>
            <input type="date" id="date_naissance_etudiant" name="date_naissance_etudiant" value="<?= $dateNaissanceEtudiant?>">
            <?php
            if (isset($erreurs["date_naissance_etudiant"])) { ?>
                <p class="erreur-validation"><?= $erreurs["date_naissance_etudiant"] ?></p>
            <?php } ?>

            <label for="adresse_etudiant">Addresse de l'étudiant*</label>
            <input type="text" id="adresse_etudiant" name="adresse_etudiant" value="<?= $adresseEtudiant?>">
            <?php
            if (isset($erreurs["adresse_etudiant"])) { ?>
                <p class="erreur-validation"><?= $erreurs["adresse_etudiant"] ?></p>
            <?php } ?>

            <label for="telephone_etudiant">Téléphone de l'étudiant*</label>
            <input type="text" id="telephone_etudiant" name="telephone_etudiant" value="<?= $telephoneEtudiant ?>">
            <?php
            if (isset($erreurs["telephone_etudiant"])) { ?>
                <p class="erreur-validation"><?= $erreurs["telephone_etudiant"] ?></p>
            <?php } ?>

            <label for="promotion">Promotion de l'etudiant</label>
            <select name="promotion" id="promotion">
                <option value="">Aucune promotion</option>
                <?php 
                foreach ($promotions as $promotion) { ?>
                <option value="<?= $promotion["id_promotion"]?>"><?= $promotion["intitule_promotion"]?></option>

                <?php } ?>
            </select>

            <label for="photo_etudiant">Photo de l'étudiant*</label>
            <input type="file" name="photo_etudiant" id="photo_etudiant">
            <?php
            if (isset($erreurs["photo_etudiant"])) { ?>
                <p class="erreur-validation"><?= $erreurs["photo_etudiant"] ?></p>
            <?php } ?>

            <p>* : Champs obligatoires</p>

            <input type="submit" value="Ajouter l'étudiant">
        </form>
    </main>

    <footer class="footer">
        <p>Copyright © 2000-2023 Best Students Inc. Tous droits réservés</p>
    </footer>
</div>
</body>
</html>