<?php

/*
 * Exercice 3 : création d'objets DateTime et différence de dates
 */

// Créer 2 objets DateTime :
// - le premier représente la date du jour et l'heure courante
// - le second représente la date du 22/06/2019 à 9h15
$dateJour = new DateTime();
$datePrecise = DateTime::createFromFormat("d/m/Y H:i" ,"22/06/2019 09:15");
// Calculer la différence entre la date du jour et la date du 22/06/2019 à 9h15
$duree = $dateJour->diff($datePrecise);
// Afficher le nombre de jours entre les 2 dates
echo $duree->days;
echo PHP_EOL;
// Afficher le nombre d'années, mois et jours entre les 2 dates
echo $duree->format("%y année ,%m mois ,%d jours.");
echo PHP_EOL;
// Afficher le nombre de jours, heures, minutes et secondes entre les 2 dates
echo $duree->format("%a  jours ,%h heures ,%i minutes et %s secondes.");
echo PHP_EOL;
// Afficher le nombre de mois entre les 2 dates
echo $duree->y * 12 + $duree->m." mois entre les 2 dates.";
//echo $mois;
