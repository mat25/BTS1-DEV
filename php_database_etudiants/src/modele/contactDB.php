<?php
require_once "connexiondb.php";

function insertContact(string $date,string $prenom,string $nom,string $email,string $telephone,string $sujet,string $message,bool $valide){
    $connexion = createConnection();

    $requeteSQL = "INSERT INTO contact (date_contact,prenom,nom,email,telephone,sujet_message,message,valider) 
                VALUES (:date,:prenom,:nom,:email,:telephone,:sujet,:message,:valide)";
    $requete = $connexion->prepare($requeteSQL);

    $requete->bindValue(":date",$date);
    $requete->bindValue(":prenom",$prenom);
    $requete->bindValue(":nom",$nom);
    $requete->bindValue(":email",$email);
    $requete->bindValue(":telephone",$telephone);
    $requete->bindValue(":sujet",$sujet);
    $requete->bindValue(":message",$message);
    $requete->bindValue("valide",$valide);

    return $requete->execute();
}


function selectAllContact() : array {
    $connexion = createConnection();
    $requete = $connexion->prepare("SELECT * FROM contact");
    $requete->execute();
    $etudiants = $requete->fetchAll(PDO::FETCH_ASSOC);

    return $etudiants;
}