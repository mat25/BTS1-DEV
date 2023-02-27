<?php

$nbPhorocopies = readline("veuillez rentrer le nombre de photocopie a réaliser : ") ;
$prix = 0 ;


if ($nbPhorocopies <= 10) {
    $prix = 0.30 * $nbPhorocopies ;
    
} elseif ($nbPhorocopies <= 30) {
    $prix = $prix + (0.30 * 10 + 0.25 * ($nbPhorocopies-10));
} else {
    $prix = $prix + (0.30 * 10 + 0.25 * 20 + 0.20 * ($nbPhorocopies - 30)) ;
}

if ($prix > 50) {
    $prix = $prix * 0.90 ;
}

echo "le prix est egal a $prix €" ;


