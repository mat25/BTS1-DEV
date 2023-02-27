<?php

require "fonctions.php";

$largeur = readline("Saisir une largeur : ");
$hauteur = readline("Saisir une hauteur : ");
$nomHero = readline("Saisir le nom du hero : ");

// Initialisation de la drille
$grille = creerGrille($largeur,$hauteur);

//Placement du hero
$placementHero = placerHero($grille,$largeur,$hauteur);
echo GREEN."$nomHero est positionné en ($placementHero[0],$placementHero[1])".RESET;
echo PHP_EOL;

// Placement des obstacles
placementObstacle($grille,$largeur,$hauteur);

// Placement point arriver
placementArriver($grille,$largeur,$hauteur);

// Affichage de la grille
echo getGrille($grille,$largeur);













