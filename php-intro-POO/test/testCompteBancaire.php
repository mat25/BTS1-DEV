<?php
require_once "../CompteBancaire.php";

$compte1 = new CompteBancaire("JEAN Matéo","2020-01-01");
$compte2 = new CompteBancaire("BLEAU Lucas","2000-01-01");

$compte1->addsolde(150);
$compte1->verifCompteGold();
$compte2->verifCompteGold();
$compte1->virementEntreCompte($compte2,30);
echo $compte1->voirCompte();
echo PHP_EOL.PHP_EOL.PHP_EOL;
echo $compte2->voirCompte();

