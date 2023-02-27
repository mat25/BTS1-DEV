<?php

/* 
demander a l'utilisateur de saisir un nombre et de renvoyer si ce nombre et pair ou impair 
*/
$nombre = readline("donner un nombre : ");

if ($nombre % 2 != 0) {
    echo "le nombre $nombre est impair" ;
}else {
    echo "le nombre $nombre est pair" ;
}