<?php

$nouvellePartie = 0 ;
$nombrePartie = 0 ;
$menuQuitter=-1 ;

while ($menuQuitter <> 3) {
    sleep(1) ;
    echo PHP_EOL ;
    echo "1. Nouvelle Partie\n2. Nombre de Parties\n3. Quitter\n" ;
    $choixUtilisteurs = readline("choisisser un nombre entre 1 et 3 celon se que vous voulez faire : ");

    if ($choixUtilisteurs == 1) {
        $nombreUtilisateur = readline("saisir un nombre entre 0 et 1000 : ") ;
        echo PHP_EOL ;


        while ($nombreUtilisateur < 0 || $nombreUtilisateur > 1000) {
            echo "le nombre a deviner doit etre compris entre 0 et 1000" ;
            echo PHP_EOL ;
            $nombreUtilisateur = readline("saisir un nombre entre 0 et 1000 : ") ;
        }

        $nbCoups = 1 ;
        $nombreOrdinateur = random_int(0,1000) ;


        while ($nombreUtilisateur <> $nombreOrdinateur) {
            if ($nbCoups > 200) {
                break;
            }
            $nombreOrdinateur = random_int(0,1000) ;
            $nbCoups += 1 ;
        }


        if ($nbCoups <= 200) {
            echo "le nombre a été trouver en $nbCoups coups" ;
            echo PHP_EOL ;
        } else {
            echo "Tu n'a pas trouver le nombre en moins de 200 coups";
            echo PHP_EOL ;
        }

        $nombrePartie += 1 ; 
    
    } elseif ($choixUtilisteurs == 2) {
        echo "Vous avez jouer $nombrePartie partie" ;
        echo PHP_EOL ;
    
    } elseif ($choixUtilisteurs == 3) {
        echo "Vous avez quitter" ;
        break ;
    } else {
        echo "veuillez entrer un numero de menu correcte" ;
        echo PHP_EOL ;
        $choixUtilisteurs = readline("choisisser un nombre entre 1 et 3 celon se que vous voulez faire ");

    }

}