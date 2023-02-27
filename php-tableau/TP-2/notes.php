<?php


$tableauNotes=[];


$notesSaisie = readline("Saisir une note (q pour arreter) : ");
while ($notesSaisie != "q") {
    if ($notesSaisie >= 0 && $notesSaisie <= 20) {
        $tableauNotes[] = $notesSaisie ;
    } else {
        echo "La notes saisie est incorrect" ;
        echo PHP_EOL ;
    }
    $notesSaisie = readline("Saisir une note (q pour arreter) : ");

}
echo "Vous avez saisie ".count($tableauNotes)." notes" ;
echo PHP_EOL ;
echo "Les notes saisie sont " ;
$notesSupA10 = [];
foreach ($tableauNotes as $notes) {
    echo $notes." ";
    if ($notes >= 10) {
        $notesSupA10[] = $notes;
    }
}

echo PHP_EOL;
if (count($notesSupA10) > 0) {
    $moyenne = array_sum($notesSupA10) / count($notesSupA10) ;
    echo "La moyenne des notes superieurs ou egales a 10 est ".round($moyenne,2);
} else {
    echo "Il n'y a aucune notes superieur a 10 !";
}



