<?php

echo "Aujourd'hui nous sommes le ".date('d/m/Y ');
echo PHP_EOL ;


// "\" permet d'enlever la fonction a la lettre qui est aprés
$heure = date('H\hi') ;
echo "Il est actuellement $heure ";
echo PHP_EOL ;



// parceque lors de la transformation il s'arrete au h donc on par exemple pour 15h00 il renvoie 15
if (date('H') >= 13) {
    echo "je vous souhaite une bonne aprés-midi" ;
} else {
    echo "je vous souhaite une bonne matiner" ;
}


 