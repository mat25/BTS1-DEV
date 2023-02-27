<?php

$tableau = array_fill(0,100000,1) ;
$texteRouge = "\033[31m";
$texteVert = "\033[32m";
$normal = "\033[0m";

echo "debut traitement";
echo PHP_EOL;

$i=0;
foreach ($tableau as $a) {
    $pourcentage = $i / 1000;
    echo "En cours : ".$texteRouge.round($pourcentage,0)."%".$normal."\r";
    $i+=1;
}

//probleme avec la fin du foreach
echo $texteVert."100 %            ".$normal;
echo PHP_EOL;
echo "fin traitement";
echo PHP_EOL;
echo PHP_EOL;
echo "100000 valeurs on été traités";








