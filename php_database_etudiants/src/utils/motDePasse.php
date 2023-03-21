<?php


function checkPassword($password) {
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
        else {
            $caracteresSpeciaux = 1;
        }
    }


}