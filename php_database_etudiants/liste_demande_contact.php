<?php
session_start();
require "./src/modele/contactDB.php";

$contacts = selectAllContact();

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
        <h1>Listes des contacts</h1>
    </header>

    <main class="contain">
        <div class="demande_contacts">
                <p>Prénom</p>
                <p>Nom</p>
                <p>Sujet du message</p>
                <p>Validé</p>
            <?php
            foreach ($contacts as $contact) { ?>
                    <p><?= $contact["prenom"]?></p>
                    <p><?= $contact["nom"] ?></p>
                    <p><?= $contact["sujet_message"]?></p>
                    <p><?= $contact["valider"]?></p>
            <?php } ?>
        </div>
    </main>

    <footer class="footer">
        <p>Copyright © 2000-2023 Best Students Inc. Tous droits réservés</p>
    </footer>
</div>
</body>
</html>