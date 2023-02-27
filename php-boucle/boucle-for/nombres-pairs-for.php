<?php

$nombreUtilisateurs = readline("saisr un nombre jusqu'a ou afficher les nombres : ");

for ($nombrePairs=0;$nombrePairs <= $nombreUtilisateurs;$nombrePairs++) {
    
    if ($nombrePairs % 2 == 0) {
        echo $nombrePairs ;
        echo PHP_EOL ;
    }
}