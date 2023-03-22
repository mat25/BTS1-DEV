<?php
session_start();
    require_once "./src/modele/horaireDB.php";
    require "./src/modele/contactDB.php";
    require_once "./src/utils/jour.php";
    $horaires = selectAllTimeTable();

    $prenom = null;
    $nom = null;
    $mail = null;
    $telephone = null;
    $subject = null;
    $message = null;
    $date = date("Y-m-d H:m:s");
    $valide = false;
    $erreurs = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty(trim($_POST["prenom"]))) {
            $erreurs["prenom"] = "Le prenom est obligatoire";
        } else {
            $prenom = trim($_POST["prenom"]);
        }

        if(empty(trim($_POST["nom"]))) {
            $erreurs["nom"] = "Le nom est obligatoire";
        } else {
            $nom = trim($_POST["nom"]);
        }

        if (empty(trim($_POST["email"]))) {
            $erreurs["email"] = "L'email est obligatoire";
        } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
            $erreurs["email"] = "L'email n'est pas valide";
        } else {
            $mail = trim($_POST["email"]);
        }

        if(empty(trim($_POST["telephone"]))) {
            $erreurs["telephone"] = "Le telephone est obligatoire";
        } else {
            $telephone = trim($_POST["telephone"]);
        }

        if(empty(trim($_POST["sujet"]))) {
            $erreurs["sujet"] = "Le sujet est obligatoire";
        } else {
            $subject = trim($_POST["sujet"]);
        }

        if(empty(trim($_POST["message"]))) {
            $erreurs["message"] = "Le message est obligatoire";
        } else {
            $message = trim($_POST["message"]);
        }


        if (empty($erreurs)) {

            $entetes = [
                "from" => "contact@BestStudent.fr",
                // TEXT-plain correspond au type MIME du contenus
                "content-type" => "text/html; charset=utf-8",
            ];

            $objet = "Reponse automatique Best Student";
            $messageReponse = "
            <p>Bonjour,</p>
            <br>
            <p>Nous avons bien reçu votre demande de contact, nous allons la traité dans les plus bref délai.</p>
            <br>
            <p>Cordialement,</p>
            <p>Best Student</p>
            ";

            if (mail($mail,$objet,$messageReponse,$entetes)) {

                insertContact($date,$prenom,$nom,$mail,$telephone,$subject,$message,$valide);
                header("Location: index.php");

            } else {
                $erreurs["message"] = "Une Erreur interne est survenue";
            }

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <h1>Best Students</h1>
    </header>

    <main class="contain">
        <div class="grille_contact">
            <div class="descritpion_et_horaire">
                <h1>Horaire d'ouverture</h1>

                <?php
                $jourFr = jourDeLaSemaine();
                foreach ($horaires as $horaire) {
                    if (empty($horaire["horaire_debut_matin"])) {

                        if ($horaire["jour"] == $jourFr) { ?>
                                <div class="JourDAujourdHui">
                                <p><?= $horaire["jour"]?> : Fermer</p>
                                </div>
                        <?php } else { ?>
                            <p><?= $horaire["jour"]?> : Fermer</p>
                        <?php }?>

                    <?php } elseif (empty($horaire["horaire_debut_aprés_midi"])) {

                        if ($horaire["jour"] == $jourFr) { ?>
                            <div class="JourDAujourdHui">
                                <p><?= $horaire["jour"]?> : <?= $horaire["horaire_debut_matin"]?> - <?= $horaire["horaire_fin_matin"]?> </p>
                            </div>
                        <?php } else { ?>
                                <p><?= $horaire["jour"]?> : <?= $horaire["horaire_debut_matin"]?> - <?= $horaire["horaire_fin_matin"]?> </p>
                        <?php }?>


                    <?php } else {

                        if ($horaire["jour"] == $jourFr) { ?>
                            <div class="JourDAujourdHui">
                                <p><?= $horaire["jour"]?> : <?= $horaire["horaire_debut_matin"]?> - <?= $horaire["horaire_fin_matin"]?> |
                                    <?= $horaire["horaire_debut_aprés_midi"]?> - <?= $horaire["horaire_fin_apres_midi"]?></p>
                            </div>
                        <?php } else { ?>
                            <p><?= $horaire["jour"]?> : <?= $horaire["horaire_debut_matin"]?> - <?= $horaire["horaire_fin_matin"]?> |
                                <?= $horaire["horaire_debut_aprés_midi"]?> - <?= $horaire["horaire_fin_apres_midi"]?></p>
                        <?php }?>

                    <?php } ?>
                <?php } ?>
            </div>
            
            <div class="formulaire_contact">
                <h1>Contactez Nous !</h1>
                <form action="" method="post">

                    <input type="text" name="prenom" placeholder="Prénom" value="<?= $prenom?>">
                    <?php
                    if (isset($erreurs["prenom"])) { ?>
                    <p class="erreur-validation"><?= $erreurs["prenom"] ?></p>
                    <?php } ?>

                    <input class="nom" type="text" name="nom" placeholder="Nom" value="<?= $nom?>">
                    <?php
                    if (isset($erreurs["nom"])) { ?>
                        <p class="erreur-validation"><?= $erreurs["nom"] ?></p>
                    <?php } ?>

                    <input type="text" name="email" placeholder="Email" value="<?= $mail?>">
                    <?php
                    if (isset($erreurs["email"])) { ?>
                        <p class="erreur-validation"><?= $erreurs["email"] ?></p>
                    <?php } ?>

                    <input type="text" name="telephone" placeholder="Téléphone" value="<?= $telephone?>">
                    <?php
                    if (isset($erreurs["telephone"])) { ?>
                        <p class="erreur-validation"><?= $erreurs["telephone"] ?></p>
                    <?php } ?>

                    <input type="text" name="sujet" placeholder="Sujet de votre message" value="<?= $subject?>">
                    <?php
                    if (isset($erreurs["sujet"])) { ?>
                        <p class="erreur-validation"><?= $erreurs["sujet"] ?></p>
                    <?php } ?>

                    <textarea class="message" name="message" rows="5" placeholder="Votre message"><?= $message?></textarea>
                    <?php
                    if (isset($erreurs["message"])) { ?>
                        <p class="erreur-validation"><?= $erreurs["message"] ?></p>
                    <?php } ?>

                    <input type="submit" value="Envoyer">
                </form>
            </div>
            
            <div class="info_general">
                <div class="logo_reseau_sociaux">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                </div>

                <div class="ville">
                    <h2>Besançon</h2>
                </div>

                <div class="numero">
                    <h2>03 85 65 74 56</h2>
                </div>

                <div class="addresse">
                    <p>10 chemin de l'Espérance,</p>
                    <p>25000 FONTAINE ÉCU</p>
                </div>

                <div class="localisation">
                <a href="https://goo.gl/maps/uxjePBHpUDyK3rjG7"><p><i class="fa-solid fa-location-dot"></i>Venir nous voir</p></a>
                </div>

                <div class="contact_info">
                <a href="mailto: contact@BestStudent.fr">contact@BestStudent.fr</a>
                </div>

            </div>
        </div>

    </main>

    <footer class="footer">
        <p>Copyright © 2000-2023 Best Students Inc. Tous droits réservés</p>
    </footer>
</div>
</body>
</html>
