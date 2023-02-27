<?php

$largeur = readline("Saisir une largeur : ");
$hauteur = readline("Saisir une hauteur : ");


$grille = [];
//Constante : "varable qui est initialisée à sa déclaration
//et qui ne peux plus être modifiée par la suite
const POSITION_VIDE = "-";
const POSITION_HERO = "H";
//****************************
//Initialisation de la grille
//****************************

for ($i=0; $i < $hauteur;$i++) {
    for($y=0;$y < $largeur;$y++){
        $grille[$i][$y]=POSITION_VIDE;
    }
}


//****************************
//Positionnement du Héro aléatoirement
//****************************

$heroLigne = mt_rand(0,$hauteur-1);
$heroColonne = mt_rand(0,$largeur-1);

$grille[$heroLigne][$heroColonne] = POSITION_HERO;


//****************************
//Initialisation des Couleurs
//****************************
$texteBleu = "\033[34m";
$texteJaune = "\033[33m";
$normal = "\033[0m";


//****************************
//Affichage de la Grille
//****************************
echo $texteBleu.str_repeat(" ",5);
// affiche les nombres de la largeur
for ($i=0;$i<$largeur;$i++) {
    echo sprintf('%02d  ', $i);
}
echo PHP_EOL.$normal;


for($i=0; $i<$hauteur; $i++) {
    echo $texteBleu.sprintf('%02d', $i).$normal;
    echo " ".'|';
    for($j=0; $j<$largeur; $j++) {
        if ($grille[$i][$j] == "-") {
            echo " ".$texteJaune.$grille[$i][$j].$normal;
            echo " "."|";
        }
        else {
            echo " ".$grille[$i][$j];
            echo " "."|";
        }
    }
    echo PHP_EOL;
}



