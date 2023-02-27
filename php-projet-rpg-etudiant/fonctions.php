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
            if ($position == POSITION_VIDE){
                $uneLigne .= ' | ' . YELLOW.POSITION_VIDE.RESET ;
            } elseif ($position == POSITION_HERO) {
                $uneLigne .= ' | ' . GREEN.POSITION_HERO.RESET ;
            } elseif ($position == POSITION_OBSTACLE) {
                $uneLigne .= ' | ' . RED.POSITION_OBSTACLE.RESET ;
            } elseif ($position == POSITION_ARRIVER) {
                $uneLigne .= ' | ' . BLUE.POSITION_ARRIVER.RESET ;
            }

        }
        $lignes .= $uneLigne . ' | ' . PHP_EOL;}

    $resultat = $numerosColonne.$lignes;

    return $resultat;
}


function positionVide(array $grille,int $largeur, int $hauteur) : array {
    $Ligne = mt_rand(0,$hauteur-1);
    $Colonne = mt_rand(0,$largeur-1);

    while ($grille[$Ligne][$Colonne] <> '-'){
        $Ligne = mt_rand(0,$hauteur-1);
        $Colonne = mt_rand(0,$largeur-1);
    }

    $resultat = [$Ligne,$Colonne];
    return $resultat;
}


function placerHero(array& $grille,int $largeur, int $hauteur) : array {
    $positionVide = positionVide($grille,$largeur,$hauteur);
    $Ligne = $positionVide[0];
    $Colonne = $positionVide[1];

    $grille[$Ligne][$Colonne] = POSITION_HERO;

    $placementHero = [$Ligne,$Colonne];
    return $placementHero;
}


function placementObstacle(array& $grille,int $largeur, int $hauteur) : void {
    $nbObstaclesAPlacer = $largeur * $hauteur * 0.15;
    $nbObstaclesAPlacer = (int)$nbObstaclesAPlacer;

    for ($i=0;$i<$nbObstaclesAPlacer;$i++) {
        $positionVide = positionVide($grille,$largeur,$hauteur);
        $Ligne = $positionVide[0];
        $Colonne = $positionVide[1];

        $grille[$Ligne][$Colonne] = POSITION_OBSTACLE;
    }
}


function placementArriver(array& $grille,int $largeur, int $hauteur) :void {
    $positionVide = positionVide($grille,$largeur,$hauteur);
    $Ligne = $positionVide[0];
    $Colonne = $positionVide[1];

    $grille[$Ligne][$Colonne] = POSITION_ARRIVER ;

}


