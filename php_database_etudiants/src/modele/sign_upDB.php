<?php
require_once "connexiondb.php";


// Insert into users (...) Values (...)
function addUser(string $prenom,string $nom,
                    string $email,string $motDePasse) : bool{
    $connexion = createConnection();

    $requeteSQL = "INSERT INTO users (prenom,nom,email,mot_de_passe)
                    VALUES (:prenom,:nom,:email,:mot_de_passe)";

    $requete = $connexion->prepare($requeteSQL);
    $requete->bindValue(":prenom",$prenom);
    $requete->bindValue(":nom",$nom);
    $requete->bindValue(":email",$email);
    $requete->bindValue(":mot_de_passe",$motDePasse);

    return $requete->execute();
}

function selectAccountByEmail($email) {
    $connexion = createConnection();
    $requeteSQL = "SELECT * FROM users WHERE email = :email";
    $requete = $connexion->prepare($requeteSQL);
    $requete->bindValue(":email",$email);
    $requete->execute();
    $etudiant = $requete ->fetch(PDO::FETCH_ASSOC);
    return $etudiant;
}
