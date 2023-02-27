<?php

$nombre = 3 ;
$nombreFin = readline("saisr un nombre jusqu'a ou afficher les nombres : ") ;


while($nombre <= $nombreFin) {
    
    if ($nombre % 2 == 0) {
        echo $nombre ;
        echo PHP_EOL ;
    }
    
    $nombre+=1 ;
}