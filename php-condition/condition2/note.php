<?php

$note = readline("indiquer votre note : ") ;

if ($note > 10) {
    echo "BRAVO, vous êtes au dessus de la moyenne !" ;
}elseif ($note == 10 ) {
    echo "Vous avez juste la moyenne" ;
}else {
    echo " vous n'avez pas la moyenne !" ;
}