<?php

$equipes = ['France','Brésil','Argentine','Espagne','Sénégal','Australie','Belgique'];
$equipeSaisie = readline('Saisir une equipe : ') ;


echo PHP_EOL ;
echo "---------------- Version boucle ----------------" ;
echo PHP_EOL ;
$equipeTrouver = false;
$equipeSaisie = ucfirst(strtolower($equipeSaisie));
foreach($equipes as $equipe) {
    if ($equipeSaisie == $equipe) {
        $equipeTrouver = true ;
        break;
    }
}

if ($equipeTrouver) {
    echo "$equipe sera presente a la prochaine coupe du monde ! " ;

} else {
    echo "$equipeSaisie ne sera pas a la prochaine coupe du monde ! ";
}

echo PHP_EOL ;
echo "---------------- Version PHP ----------------" ;
echo PHP_EOL ;
if (in_array($equipeSaisie, $equipes)) {
    echo $equipes[array_search($equipeSaisie,$equipes)]." sera presente a la prochaine coupe du monde ! " ;
} else {
    echo "$equipeSaisie ne sera pas a la prochaine coupe du monde ! " ;
}


