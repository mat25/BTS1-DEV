<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Page</title>
</head>
<body>
    <h1>Exemple de page</h1>

    <pre>
        <?php
            var_dump($_SERVER);
        ?>
    </pre>

    <?php
    if ($_SERVER["REQUEST_METHOD"]=="GET") {
        echo "<a>Appeler en metohd GET </a>";
    } else {
        echo "<a> Pas appeler en method GET mais en </a>".$_SERVER["REQUEST_METHOD"];
    }
    ?>

    <?php
        echo PHP_EOL;
        echo "La requete a été fais le ".date("d/m/Y/ \a H:i:s",$_SERVER["REQUEST_TIME"])
    ?>
</body>
</html>
