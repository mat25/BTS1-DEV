<?php

$date = date("d/m/Y") ;
echo "aujourd'hui nous sommes le $date" ;
echo PHP_EOL ;


$jour = date('l') ;

if (date('l') == "Saturday") {
    echo "Je vous souhaite un bon week-end" ;
} elseif ($jour == "Sunday") {
    echo "Je vous souhaite un bon dimanche" ;
} else {
    echo "Je vous souhaite un bonne journée" ;
} 