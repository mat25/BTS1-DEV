<?php
    $nom = "Dupond";
    $age = 18;
    ?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Conditions</title>
</head>
<body>
    <h1>Les Conditions</h1>
    <div>
        <a href="index.php">Retour au sommaire</a>
    </div>
    <div>
        <?php
            if($age >=18){
                echo "<p>$nom est majeur !</p>";
            } else {
                echo "<p>$nom est mineur !</p>";
            }
        ?>
    </div>

    <div>
        <?php
            if ($age >= 18) {
                echo "<p>$nom est <span class='vert'>majeur</span> !</p>";
            } else {
                echo "<p>$nom est <span class='rouge'>mineur</span> !</p>";
            }
        ?>
    </div>

    <div>
        <?php
            if ($age >= 18) {
                $style = 'vert';
            } else {
                $style = 'rouge';
            }
        ?>
        <p><?=$nom?> est <span class='<?= $style?>'>majeur</span> !</p>
    </div>

    <h2>Utilisation d'une ternaire</h2>
<!-- Une ternaire permet de simplifier une condition   -->
<!-- $variable = Condition ? expression :expression; -->
<!--        ? = Alors   et              : = sinon -->

    <?php
        $style= ($age >= 18) ? 'vert' : 'rouge';
    ?>
    <p><?=$nom?> est <span class='<?= $style?>'>majeur</span> !</p>

    <div>
        <p><?=$nom?> est <span class='<?= $age>=18 ? 'vert' : 'rouge';?>'>majeur</span> !</p>
    </div>
</body>
</html>