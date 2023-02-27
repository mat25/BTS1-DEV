<?php

$heureEntiere = readline("Saisir une heure (h:mm) : ");
$heure = substr($heureEntiere,0,-3);


if ( ($heure>= 9 && $heure < 12 ) || ($heure>= 14 && $heure < 19)) {
    echo "le magasin est ouvert" ;
} else {
    echo "le magasin est fermé" ;
}
