<?php

$adresseMail = readline("saisir votre adresse mail : ") ;

if (filter_var($adresseMail, FILTER_VALIDATE_EMAIL)) {
    echo "L'adresse e-mail est valide";
} else {
    echo "L'adresse e-mail n'est pas valide";
}
