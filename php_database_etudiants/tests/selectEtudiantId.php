<?php

require_once '../src/modele/etudiantDB.php';

$id = readline("Saisir l'id de l'etudiant a rechercher : ");

$etudiant = selectStudentByID($id);

// Afficher le résultat
if (!$etudiant) {
    echo "Aucun etudiant avec cette ID";
} else {
    echo $etudiant["id_etudiant"]." "
        .$etudiant['prenom_etudiant']." "
        .$etudiant['nom_etudiant']." "
        .$etudiant['email_etudiant']." "
        .PHP_EOL;
}
