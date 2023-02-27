<?php

// -------------------------------------------------------------------
// Exemple 1
// -------------------------------------------------------------------

$date1 = "12-11-2022";
$date2 = "22-05-2021";
//comparer les 2 dates
if ($date1 > $date2) {
    echo "$date1 est superier a $date2";
} else {
    echo "$date2 est superier a $date1";
}

// PROBLEME
// ici les dates sont des chaines de caractères
// la comparaison s'effectuent caractere par caractère
// On ne peux pas utiliser les operateurs de comparaison (<, <=, ==,>, >= )
// pour camparer des dates

// SOLUTION
// Utiliser des timestamps
// Un timestamps represente le nombre de seconde
// écoulées entre cette dates et le 1er janvier 1970
// On va convertir chaque date en timestamp
echo PHP_EOL;
if (strtotime($date1) > strtotime($date2)) {
    echo "$date1 > a $date2";
} else {
    echo "$date1 < a $date2";
}

// -------------------------------------------------------------------
// Exemple 2
// -------------------------------------------------------------------
$date1 = "12/11/2022";
$date2 = "22/05/2021";
$timestamp1 = strtotime($date1);

// PROBLEME
// Le format des 2 dates n'est pas
// interpreter correctement par PHP
// Il faut utiliser un format de date
// reconnue et interpretable par PHP
// (voir documentation

// SOLUTION
// Transformer les dates dans un format correctement
// interpretable par PHP

$date1 = str_replace("/","-",$date1);
$date2 = str_replace("/","-",$date2);
echo PHP_EOL;
if (strtotime($date1) > strtotime($date2)) {
    echo "$date1 > a $date2";
} else {
    echo "$date1 < a $date2";
}

// -------------------------------------------------------------------
// Exemple 3 : conversion timestamp vers date
// -------------------------------------------------------------------

$timestamp = 1668207600;
$date = date("d/m/Y",$timestamp);


// -------------------------------------------------------------------
// Exemple 4 : Formatage d'une date
// -------------------------------------------------------------------

$date = "22-05-2022";
$dateFormate = date("d/m/Y",strtotime($date));



// Quelques formats de dates en PHP
$date = "22 May 2021";
$dateFormate = date("d/m/Y",strtotime($date));

$date = "2021/05/22";
$date = "2021-05-22";










