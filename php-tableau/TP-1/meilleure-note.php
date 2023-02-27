<?php

$notesSIO = [10, 12.5, 14, 7, 15, 9.5, 8] ;


$max=0 ;
foreach($notesSIO as $note) {
    if ($max < $note) {
        $max = $note;
    }
}

echo "la meilleure note est $max" ;

echo PHP_EOL ;
echo "la meilleure note est ".max($notesSIO) ;

