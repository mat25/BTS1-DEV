<?php
require_once "./src/modele/sign_upDB.php";
$prenom = null;
$nom = null;
$email = null;
$motDePasse = null;
$confirmationMotDePasse = null;
$erreurs = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["prenom"]))) {
        $erreurs["prenom"] = "Le prenom est obligatoire";
    } else {
        $prenom = trim($_POST["prenom"]);
    }

    if (empty(trim($_POST["nom"]))) {
        $erreurs["nom"] = "Le nom est obligatoire";
    } else {
        $nom = trim($_POST["nom"]);
    }

    if (empty(trim($_POST["email"]))) {
        $erreurs["email"] = "L'email est obligatoire";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $erreurs["email"] = "L'email n'est pas valide";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["email"]))) {
        $erreurs["email"] = "L'email est obligatoire";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $erreurs["email"] = "L'email n'est pas valide";
    } elseif (!empty(selectAccountByEmail(trim($_POST["email"])))) {
        $erreurs["email"] = "Un compte est deja associer a cette email";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["mot_de_passe"]))) {
        $erreurs["mot_de_passe"] = "Le mot de passe est obligatoire";
    } elseif (strlen(trim($_POST["mot_de_passe"])) < 10 ) {
        $erreurs["mot_de_passe"] = "Le mot de passe doit comporter au moins 10 caracteres";
    } else {
        $motDePasse = trim($_POST["mot_de_passe"]);
    }

    if (empty(trim($_POST["confirmation_mot_de_passe"]))) {
        $erreurs["confirmation_mot_de_passe"] = "Le mot de passe est obligatoire";
    } elseif (trim($_POST["confirmation_mot_de_passe"]) <> $motDePasse) {
        $erreurs["confirmation_mot_de_passe"] = "Le mot de passe n'est pas identique";
    } else {
        $confirmationMotDePasse = trim($_POST["confirmation_mot_de_passe"]);
    }

    if (!isset($_POST["rgpd"])) {
        $erreurs["rgpd"] = "Les conditons generales sont obligatoires";
    }

    if (empty($erreurs)) {
        $motDePasseChiffrer = password_hash($motDePasse,PASSWORD_ARGON2I);

        addUser($prenom,$nom,$email,$motDePasseChiffrer);
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
    <title>Contact</title>
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
            <p><a href="sign_up.php">Sign up</a></p>
        </div>
    </navigation>

    <header class="header">
        <h1>Creer un compte</h1>
    </header>

    <main class="contain">
        <form method="post" class="form_sign_up">
            <label for="prenom">Prenom*</label>
            <input type="text" id="prenom" name="prenom" value="<?= $prenom?>">
            <?php
            if (isset($erreurs["prenom"])) { ?>
                <p class="erreur-validation"><?= $erreurs["prenom"] ?></p>
            <?php } ?>

            <label for="nom">Nom*</label>
            <input type="text" id="nom" name="nom" value="<?= $nom?>">
            <?php
            if (isset($erreurs["nom"])) { ?>
                <p class="erreur-validation"><?= $erreurs["nom"] ?></p>
            <?php } ?>


            <label for="email">Email*</label>
            <input type="text" id="email" name="email" value="<?= $email?>">
            <?php
            if (isset($erreurs["email"])) { ?>
                <p class="erreur-validation"><?= $erreurs["email"] ?></p>
            <?php } ?>

            <label for="mot_de_passe">Mot de passe*</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" value="<?= $motDePasse?>">
            <?php
            if (isset($erreurs["mot_de_passe"])) { ?>
                <p class="erreur-validation"><?= $erreurs["mot_de_passe"] ?></p>
            <?php } ?>

            <label for="confirmation_mot_de_passe">Confirmation du mot de passe*</label>
            <input type="password" id="confirmation_mot_de_passe" name="confirmation_mot_de_passe" value="<?= $confirmationMotDePasse?>">
            <?php
            if (isset($erreurs["confirmation_mot_de_passe"])) { ?>
                <p class="erreur-validation"><?= $erreurs["confirmation_mot_de_passe"] ?></p>
            <?php } ?>

            <div class="condition_general">
                <input type="checkbox" id="rgpd" name="rgpd" value="" <?php if (isset($_POST["rgpd"])) { echo 'checked="checked"' ;} ?>>
                <label for="rgpd">J'ai lu et j'accepte les condition générales d'utilisation*</label>
            </div>
            <?php
            if (isset($erreurs["rgpd"])) { ?>
                <p class="erreur-validation"><?= $erreurs["rgpd"] ?></p>
            <?php } ?>
            <p>* : Champs obligatoires</p>

            <input type="submit" value="S'inscrire">
        </form>
    </main>

    <footer class="footer">
        <p>Copyright © 2000-2023 Best Students Inc. Tous droits réservés</p>
    </footer>
</div>
</body>
</html>