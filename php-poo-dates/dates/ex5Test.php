<?php

/*
 * Exercice 5 : Modification d'objets DateTime avec les méthodes add et sub
 */

// Créer un objet DateTime avec la date du 22/06/2019 à 9h15
$date = DateTime::createFromFormat("d/m/Y H:i","22/06/2019 9:15");
// Ajouter 1 mois à la date
$interval = new DateInterval("P1M");
$date->add($interval);
// Afficher la date au format jj/mm/aaaa hh:mm
echo $date->format("d/m/Y H:i");
echo PHP_EOL;
// Ajouter 2 ans, 3 mois, 1 jour, 4 heures, 5 minutes et 6 secondes à la date
$interval1 = DateInterval::createFromDateString("2 years + 3 months + 1 day + 4 hours + 5 minutes + 6 seconds");
$date->add($interval1);
// Afficher la date au format jj/mm/aaaa hh:mm
echo $date->format("d/m/Y H:i");
echo PHP_EOL;
// Retirer 1 mois à la date et 2 heures et 30 minutes à la date
$interval2 = DateInterval::createFromDateString("1 months + 2 hours + 30 minutes");
$date->sub($interval2);
// Afficher la date au format jj/mm/aaaa hh:mm
echo $date->format("d/m/Y H:i");
echo PHP_EOL;
