<?php

$prixHT = readline("Saisir un prix HT : ");
$tauxTVA = readline("Saisir un taux de TVA (en pourcentage) : ");
$prixTTC = $prixHT*($tauxTVA/100+1);

echo "Le prix TTC est de : ".round($prixTTC,2);