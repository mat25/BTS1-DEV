<?php

/*
 * Exercice 7 : fuseau horaire d'un objet DateTime
 */

// Créer un objet DateTime avec la date du jour et l'heure courante
$date = new DateTime();
// Afficher le fuseau horaire de l'objet
$timeZone = $date->getTimezone();
echo $timeZone->getName();
echo PHP_EOL;
// Modifier le fuseau horaire de l'objet pour qu'il soit à New York
$timeZone = new DateTimeZone("AMERICA/New_York");
$date->setTimezone($timeZone);
// Afficher la date du jour au format jj/mm/aaaa hh:mm
echo $date->format("d/m/Y H:i");
echo PHP_EOL;
// Créer un objet DateTime avec la date du jour et l'heure courante et le fuseau horaire de New York
$timeZone = new DateTimeZone("AMERICA/New_York");
$date1 = new DateTime("now",$timeZone);
// Afficher la date du jour au format jj/mm/aaaa hh:mm
echo $date->format("d/m/Y H:i");
echo PHP_EOL;
