<?php


$resultat = [
    ["nom"=>"bleau","moyenne"=>15],
    ["nom"=>"bas","moyenne"=>12],
    ["nom"=>"gerard","moyenne"=>7],
    ["nom"=>"kiegj","moyenne"=>20]
];

/* Version Foreach
$nomMajorde ="";
$moyenneMajorde = 0;
foreach ($resultat as $cle) {
    if ($cle["moyenne"] > 10 ) {
        echo "$cle[nom] a $cle[moyenne] pour moyenne généeral";
        echo PHP_EOL;

        if ($cle["moyenne"] > $moyenneMajorde){
            $moyenneMajorde = $cle["moyenne"];
            $nomMajorde = $cle["nom"];
        }
    }
}
*/

/* Version for
*/
$nomMajorde ="";
$moyenneMajorde = 0;
for($i=0;$i<count($resultat);$i++ ){
    $nom = $resultat[$i]["nom"];
    $moyenne = $resultat[$i]["moyenne"];
    if($moyenne >= 10) {
        echo "$nom a $moyenne pour moyenne général";
        echo PHP_EOL;

        if ($moyenneMajorde < $moyenne) {
            $moyenneMajorde = $moyenne;
            $nomMajorde = $nom;
        }
    }
}

echo "$nomMajorde est le majorde de la promotaion avec $moyenneMajorde comme moyenne";