<?php
session_start();
require_once "./src/modele/sign_upDB.php";
$userName =null;
$erreurs = null;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["username"])) {
        $user = selectAccountByEmail($_POST["username"]);
        $userName = trim($_POST["username"]);

        if (empty(selectAccountByEmail(trim($_POST["username"])))) {
            $erreurs["connexion"] = "Identifiant inconnu ou mot de passe incorrect";
        } else if (!password_verify(trim($_POST["mot_de_passe"]), $user["mot_de_passe"])) {
            $erreurs["connexion"] = "Identifiant inconnu ou mot de passe incorrect";
        }
    }
    if (!empty($_POST["deconnexion"])) {
        unset($_SESSION['connexion']['nom']);
        unset($_SESSION['connexion']['prenom']);
        unset($_SESSION['connexion']['id']);
    }

    if (empty($erreurs)) {
        if (!isset($_SESSION['connexion'])) {
            $_SESSION['connexion'] = [] ;
        }
        $_SESSION['connexion']['nom'] =  $user["nom"];
        $_SESSION['connexion']['prenom'] =   $user["prenom"];
        $_SESSION['connexion']['id'] =  $user["id_users"];

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
    <title>Connexion</title>
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
                        <form action="" method="post" class="deconnexion">
                            <input type="submit" name="deconnexion" value="Deconnexion">
                        </form>
                    <?php } ?>

        </div>
    </navigation>

    <header class="header">
        <?php
        if (isset($_SESSION['connexion']['id'])) { ?>
        <p>bonjour, <?= $_SESSION['connexion']['prenom']." ".$_SESSION['connexion']['nom']?></p>
        <?php } ?>
        <h1>Connexion</h1>
    </header>

    <main class="contain">
        <form method="post" class="form_sign_up">
            <label for="username">Email</label>
            <input type="text" id="username" name="username" value="<?= $userName?>">

            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" value="">
            <?php
            if (isset($erreurs["connexion"])) { ?>
                <p class="erreur-validation"><?= $erreurs["connexion"] ?></p>
            <?php } ?>

            <a href="sign_up.php"><p>Creez un compte ici -></p></a>
            <input type="submit" value="Se connecter">
        </form>
    </main>


    <footer class="footer">
        <p>Copyright © 2000-2023 Best Students Inc. Tous droits réservés</p>
    </footer>
</div>
</body>
</html>
