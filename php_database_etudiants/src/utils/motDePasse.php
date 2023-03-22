<?php


function checkPassword(string $password): bool {
    $minuscule = 0;
    $majuscule = 0;
    $chiffre = 0;
    $caracteresSpeciaux = 0;
    $longueur = strlen($password);
    for($i = 0; $i < $longueur; $i++) 	{
        $lettre = $password[$i];

        if ($lettre>='a' && $lettre<='z'){
            $minuscule = 1;
        }
        else if ($lettre>='A' && $lettre <='Z'){
            $majuscule = 1;
        }
        else if ($lettre>='0' && $lettre<='9'){
            $chiffre = 1;
        }
        else if ($lettre == " ") {
            return false;
        } else {
            $caracteresSpeciaux = 1;
        }
    }
    if ($minuscule + $majuscule + $chiffre + $caracteresSpeciaux == 4 and strlen($password) >= 10) {
        return true;
    } else {
        return false;
    }


}