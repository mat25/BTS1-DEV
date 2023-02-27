<?php

// Ce fichier va contenir l'ensemble des fonctions du projets

function afficherTableau(array $tab) : void {
    foreach ($tab as $nombre) {
        echo $nombre." ";
    }
    echo PHP_EOL;
}