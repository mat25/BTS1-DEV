<?php
require_once '../src/modele/etudiantDB.php';


if (!addStudent("mateo", "jean", "mj@tests.fr", "2004-08-11", "15 rue tests Besancon", "08548422")) {
    echo "L'insertion a echouer";
}

