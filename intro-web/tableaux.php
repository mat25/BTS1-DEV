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
    <title>Chaines</title>
</head>
<body>
    <h1>Les chaines de caractères</h1>

    <div>
        <a href="index.php">Retour au sommaire</a>
    </div>

    <h2>Affichage simple d'un tableau</h2>

    <?php
        $noms = ["Dupond","sapin","noel","bleau"];

        foreach ($noms as $nom) {
                echo "<p>Je m'appelle $nom</p>";
            }
    ?>

    <?php
        $noms = ["Dupond","sapin","noel","bleau"];

        foreach ($noms as $nom) { ?>
            <p>Je m'appelle <?= $nom ?> </p>
    <?php } ?>


    <h2>Affichage d'un tableau sous la forme d'une liste HTML</h2>
    <?php
        $noms = ["Dupond","sapin","noel","bleau"];
    ?>
    <ul>
        <?php
            foreach ($noms as $nom) { ?>
                <li><?= $nom?></li>
        <?php } ?>
    </ul>

    <h2>Affichage d'un tableau sous la forme d'une table HTML</h2>
    <?php
    $comptes = [
            ['prenom'=>'Jean', 'nom'=>'Dupond', 'email'=>'jdupond@exemple.fr','prenium'=>true],
            ['prenom'=>'Pierre', 'nom'=>'Durand', 'email'=>'pdurand@exemple.fr','prenium'=>false],
            ['prenom'=>'Anne', 'nom'=>'Martin', 'email'=>'amartin@exemple.fr','prenium'=>true],
            ['prenom'=>'Pauline', 'nom'=>'Sapin', 'email'=>'psapin@exemple.fr','prenium'=>false],
    ]
    ?>
    <table>
        <tr>
            <th>Prénom</th>
            <th>nom</th>
            <th>email</th>
            <th>prenium</th>
            <th>actions</th>
        </tr>
    <?php
    foreach ($comptes as $compte) { ?>
        <tr>
            <td><?php echo $compte['prenom'] ?></td>
            <td><?php echo $compte['nom']?></td>
            <td><?php echo $compte['email']?></td>
            <td><?= $compte['prenium']?"oui":"non" ?></td>
            <td class="action">
                <a href="" class="bouton_suppr">supprimer</a>
                <a href="" class="bouton_suppr">modifier</a>
                <?php if ($compte['prenium']) {
                        echo " <a href='' class='premium'>premium </a>";
                     }?>
            </td>
        </tr>

    <?php } ?>
    </table>

</body>
</html>