<?php

$note = readline("Saisir une note : ") ;

while ($note < 0 || $note > 20) {
    echo "la note est saisie doit etre comprise entre 0 et 20" ;
    echo PHP_EOL ;
    $note = readline("Saisir une note : ") ;
      
}

echo "la note est saisie est correcte" ;