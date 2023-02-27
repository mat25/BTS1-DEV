<?php
    // Tester la presence du parametre "nom"
    $nom = null;  //null -> indeterminée
    $prenom = null;
    $erreur = null;
    if (!empty($_GET["nom"]) && !empty($_GET["prenom"]) ) {  //  ! = not
        // Le parametre existe
        $nom=$_GET["nom"];
        $prenom = $_GET["prenom"];
    } else {
        // Le paramettre n'existe pas ou ets vide
        $erreur = "L'URL n'est pas valide !";
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Script2</title>
</head>
<body>
    <!-- Tester si il y a une erreur -->
    <?php
        if (isset($erreur) ) { ?>
            <div class="erreur">
                <h2>Erreur</h2>
                <p><?= $erreur?></p>
            </div>
        <?php } else { ?>
            <h1>Script2</h1>
            <p>Ceci est le script2</p>
            <p>Je m'appelle <?= $nom." ".$prenom?></p>
        <?php } ?>
</body>
</html>
