<?php


$notesSIO = [10, 12.5, 14, 7, 15, 9.5, 8] ;
if (count($notesSIO) > 0) {
    $totalNotes=0 ;

    //Version avec boucle
    foreach($notesSIO as $note) {
        $totalNotes += $note ;
    }
    $moyennes = $totalNotes / count($notesSIO);
    echo "Vous avez eu ".round($moyennes,2) ;
    echo PHP_EOL ;


    //Version sans boucle
    echo PHP_EOL ;
    if (count($notesSIO) > 0 ) {
        $moyennes = array_sum($notesSIO) / count($notesSIO) ;
        echo "Vous avez eu ".round($moyennes,2) ;
    }


    if ($moyennes < 10) {
        echo "Vous n'avez pas votre diplôme" ;
    }elseif ($moyennes <12) {
        echo "Mention trés bien" ;
    }elseif ($moyennes < 14) {
        echo "Mention passable" ;
    }elseif ($moyennes < 16) {
        echo "Mention assez bien" ;
    }else {
        echo "Mention bien" ;
    }

}else {
    echo "Le tableau est vide " ;
}









