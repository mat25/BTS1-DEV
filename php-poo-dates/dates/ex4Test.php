<?php

/*
 * Exercice 4 : création d'objets DateInterval (intervalle de temps, durée) et formatage
 */

// Créer un objet DateInterval représentant un intervalle de 4 mois et 2 jours
$interval = new DateInterval("P4M2D");
// Afficher l'intervalle au format 4m2j
echo $interval->format("%mm%dj");
echo PHP_EOL;
// Créer un objet DateInterval représentant un intervalle de 2 jours, 3 heures et 5 minutes
$interval1 = DateInterval::createFromDateString("2 day + 3 hours + 5 minutes");
// Afficher l'intervalle au format 2j03h05mn
echo $interval1->format("%dj%Hh%Imn");
echo PHP_EOL;
// Créer un objet DateInterval représentant un intervalle 4 heures, 5 minutes et 6 secondes
$interval2 = DateInterval::createFromDateString("4 hours + 5 minutes + 6 seconds");
// Afficher l'intervalle au format 04h05mn06s
echo $interval2->format("%Hh%Imn%Ss");
echo PHP_EOL;
