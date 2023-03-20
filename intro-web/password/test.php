<?php

$password = "secret";
// Hachage du mdp avec BCrypt
$hash = password_hash($password,PASSWORD_DEFAULT);
echo $hash;
echo PHP_EOL;
//
$hash = password_hash($password,PASSWORD_DEFAULT);
echo $hash;
echo PHP_EOL;
$hash = password_hash($password,PASSWORD_BCRYPT);
echo $hash;
// Hachage du mdp avec Argon2I
echo PHP_EOL;
$hash = password_hash($password,PASSWORD_ARGON2I);
echo $hash;
// Hachage du mdp avec Argon2ID
echo PHP_EOL;
$hash = password_hash($password,PASSWORD_ARGON2ID);
echo $hash;
echo PHP_EOL;

// Vérification du mdp
$password = "pass123";
$hash = password_hash("pass123",PASSWORD_ARGON2I);
if (password_verify($password,$hash)){
    echo "Connexion OK";
} else {
    echo "Connexion pas valide";
}

