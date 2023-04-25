<?php
require_once "../Rectangle.php";
// Tester la CLASS Rectangle

// 1. Creer un rectangle (objet,instance) : instanciation.
$rect1 = new Rectangle(20,10);
// $rect1 est une référece sur une instance de la class Rectangle.

// Calculer la surface du rectangle
//echo $rect1->calculerSurfaces();
//echo PHP_EOL;

echo $rect1->CalculerPerimetre();
echo PHP_EOL;
$rect1->setCouleurFond("Bleu");
echo $rect1->setDonnee();
