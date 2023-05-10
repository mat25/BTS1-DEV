<?php

require_once '../src/Entreprise.php';
require_once '../src/Formation.php';
require_once '../src/Inscription.php';
require_once '../src/Salarie.php';

$entreprise = new Entreprise('Entreprise1', 'Rue TEste', 25000, 'Besancon');

$salarie1 = new Salarie('Jean', 'Moulin', $entreprise);
$salarie2 = new Salarie('adolf', 'toto', $entreprise);

$formation = new Formation('form dev', 2, '10/05/2023', '15/05/2023');

$formation->inscrireSalarie($salarie1);
$formation->inscrireSalarie($salarie2);
$formation->noterSalarie($salarie1, 15, 'Bien');

$inscriptions = $formation->getInscriptions();

foreach ($inscriptions as $inscription) {
    $nom = $inscription->getSalarie()->getNom();
    $prenom = $inscription->getSalarie()->getPrenom();
    $note = $inscription->getNoteSalarie();
    $appreciation = $inscription->getAppreciation();
    $formations = $formation->getNomFormation();
    if ($note == -1) {
        echo "Nom de la formation = $formations " .
            PHP_EOL .
            "Nom du salarier : $nom" .
            PHP_EOL .
            "Prenom du salarier : $prenom" .
            PHP_EOL .
            PHP_EOL;
    } else {
        echo "Nom de la formation = $formations " .
            PHP_EOL .
            "Nom du salarier : $nom" .
            PHP_EOL .
            "Prenom du salarier : $prenom" .
            PHP_EOL .
            "Note du salarier : $note" .
            PHP_EOL .
            "Appréciation du salarier : $appreciation" .
            PHP_EOL .
            PHP_EOL;
    }
}
