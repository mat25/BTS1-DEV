<?php
require_once "connexiondb.php";

//SELECT * FROM etudiant
function selectAllStudents() : array {
    $connexion = createConnection();
    $requete = $connexion->prepare("SELECT * FROM etudiant");
    $requete->execute();
    $etudiants = $requete->fetchAll(PDO::FETCH_ASSOC);

    return $etudiants;
}

//SELECT * FROM etudiant WHERE id_etudiant = ?
function selectStudentByID($id) : array|bool {
    $connexion = createConnection();
    $requeteSQL = "SELECT * FROM etudiant WHERE id_etudiant = :id";
    $requete = $connexion->prepare($requeteSQL);
    $requete->bindValue(":id",$id);
    $requete->execute();
    $etudiant = $requete ->fetch(PDO::FETCH_ASSOC);
    return $etudiant;
}

// Insert into étudiant (...) Values (...)
function addStudent(string $prenom,string $nom,
                    string $email,string $dateNaissance,string $addresse,string $telephone,string $promotion,string $photo) : bool{
    $connexion = createConnection();

    if (empty($promotion)) {
        $requeteSQL = "INSERT INTO etudiant (prenom_etudiant,nom_etudiant,email_etudiant,date_naissance_etudiant,adresse_etudiant,telephone_etudiant,photo_etudiant)
                        VALUES (:prenom,:nom,:email,:dateNaissance,:adresse,:telephone,:photo)";
        $requete = $connexion->prepare($requeteSQL);
    } else {
        $requeteSQL = "INSERT INTO etudiant (prenom_etudiant,nom_etudiant,email_etudiant,date_naissance_etudiant,adresse_etudiant,telephone_etudiant,id_promotion,photo_etudiant)
                        VALUES (:prenom,:nom,:email,:dateNaissance,:adresse,:telephone,:promotion,:photo)";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":promotion",$promotion);
    }

    $requete->bindValue(":prenom",$prenom);
    $requete->bindValue(":nom",$nom);
    $requete->bindValue(":email",$email);
    $requete->bindValue(":dateNaissance",$dateNaissance);
    $requete->bindValue(":adresse",$addresse);
    $requete->bindValue(":telephone",$telephone);
    $requete->bindValue(":photo",$photo);

    return $requete->execute();
}