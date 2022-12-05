<?php
require "constantes.php";

// Fonction permettant d'effacer l'écran
function effacerEcran() : void {
    echo chr(27).chr(91).'H'.chr(27).chr(91).'J';
}


function creerGrille(int $largeur, int $hauteur) : array {
    $grille = [];

    for($i=0; $i<$hauteur; $i++) {
        // Parcours de chaque colonne
        for($j=0; $j<$largeur; $j++) {
            $grille[$i][$j] = POSITION_VIDE;
        }
    }
    return $grille;
}

function getGrille(array $grille, int $largeur) : string {
    $numerosColonne = str_repeat(' ',5) ;
    for ($i=0; $i < $largeur; $i++) {
        $numerosColonne .= BLUE . sprintf('%02d  ', $i) . RESET;
    }
    $numerosColonne .= PHP_EOL;


    $lignes = '';
    foreach ($grille  as $numero=>$ligne) {
        $uneLigne = BLUE . sprintf('%02d', $numero) . RESET;
        foreach ($ligne as $position) {
            if ($position == '-'){
                $uneLigne .= ' | ' . YELLOW.POSITION_VIDE.RESET ;
            } else {
                $uneLigne .= ' | ' . GREEN.POSITION_HERO.RESET ;
            }

        }
        $lignes .= $uneLigne . ' | ' . PHP_EOL;}

    $resultat = $numerosColonne.$lignes;

    return $resultat;
}

function placerHero(array& $grille,int $largeur, int $hauteur) : array {
    $heroLigne = mt_rand(0,$hauteur-1);
    $heroColonne = mt_rand(0,$largeur-1);

    while ($grille[$heroLigne][$heroColonne] <> '-'){
        $heroLigne = mt_rand(0,$hauteur-1);
        $heroColonne = mt_rand(0,$largeur-1);
    }
    $grille[$heroLigne][$heroColonne] = POSITION_HERO;

    $placementHero = [$heroLigne,$heroColonne];
    return $placementHero;
}


