<?php
    require_once "./src/modele/horaireDB.php";
    require_once "./src/utils/jour.php";
    $horaires = selectAllTimeTable();
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
            <div class="nouvelle-etudiant">
                <p><a href="new_student.php">Nouvel Etudiant</a></p>
            </div>
            <div class="contact">
                <p><a href="contact.php">Contact</a></p>
            </div>
        </navigation>

    <header class="header">
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

                    <input type="text" name="prenom" placeholder="Prénom">

                    <input class="nom" type="text" name="nom" placeholder="Nom">

                    <input type="text" name="email" placeholder="Email">

                    <input type="text" name="telephone" placeholder="Téléphone">

                    <input type="text" name="promotion" placeholder="Promotion">

                    <input type="text" name="sujet" placeholder="Sujet de votre message">

                    <textarea class="message" name="message" rows="5" placeholder="Votre message"></textarea>

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
