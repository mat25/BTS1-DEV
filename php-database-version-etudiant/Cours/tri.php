<?php

$tableau = [
    ['nom' => 'pierre','age' => 45],
    ['nom' => 'jean','age' => 60],
    ['nom' => 'anne','age' => 51],
    ['nom' => 'pauline','age' => 43],
];


//----------------------------------------------------------
// Exemple 1 :tri croissant (ascendant) en fonction de l'age
//----------------------------------------------------------


//1. Recuperer dans sun tableau les valeurs du champ sur lequel
//est effectué le tri
$age = array_column($tableau,'age');
//2. Executer le tri
array_multisort($age,SORT_ASC,SORT_NUMERIC,$tableau);


//----------------------------------------------------------
// Exemple 2 :tri décroissant (descendant) en fonction de l'age
//----------------------------------------------------------


$tableau = [
    ['nom' => 'pierre','age' => 45],
    ['nom' => 'jean','age' => 60],
    ['nom' => 'anne','age' => 51],
    ['nom' => 'pauline','age' => 43],
];


$age = array_column($tableau,'age');
array_multisort($age,SORT_DESC,SORT_NUMERIC,$tableau);



//----------------------------------------------------------
// Exemple 3 :tri alphabetique (sensible a la casse) en fonction du nom
//----------------------------------------------------------
$tableau = [
    ['nom' => 'pierre','age' => 45],
    ['nom' => 'Jean','age' => 60],
    ['nom' => 'anne','age' => 51],
    ['nom' => 'Pauline','age' => 43],
];

$nom = array_column($tableau,'nom');
array_multisort($nom,SORT_ASC,SORT_STRING,$tableau);



//----------------------------------------------------------
// Exemple 4 :tri alphabetique (insensible a la casse) en fonction du nom
//----------------------------------------------------------
$tableau = [
    ['nom' => 'pierre','age' => 45],
    ['nom' => 'Jean','age' => 60],
    ['nom' => 'anne','age' => 51],
    ['nom' => 'Pauline','age' => 43],
];

$nom = array_column($tableau,'nom');
array_multisort($nom,SORT_ASC,SORT_STRING | SORT_FLAG_CASE,$tableau);
print_r($tableau);

//  | = pype

