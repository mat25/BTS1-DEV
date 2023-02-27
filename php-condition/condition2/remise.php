<?php

$prixArticle = readline("Saisir le prix de l'article : ") ;

//Couleur
$fondRouge = "\033[41m";
$normal = "\033[0m";

if ($prixArticle < 1000) {
    $remise = $prixArticle * 0.05;
} elseif ($prixArticle >= 5000) {
    $remise = 20;
} else {
    $remise = 10 ;
}



$prixReduit = $prixArticle - $remise * $prixArticle/100;


echo "la remise est de $remise% soit " .$fondRouge.number_format($remise,2,","," ") .$normal." sur le prix de l'article !" ;
echo PHP_EOL ;
echo "le montant de l'article aprés reduction est de ".$fondRouge.number_format($prixReduit,2,","," ").$normal." euros";