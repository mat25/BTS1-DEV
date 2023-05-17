<?php
require_once "./src/modele/entites/Auteur.php";
require_once "./src/modele/config/Database.php";
// Cette classe permet de faire du CRUD
// Et du mapping Objet-Relationnel

Class AuteurDao {

    // Méthode permmettant de rechercher l'ensemble des Livres
    /**
     * @return Auteur[]
     */
    public function findAll():array {
        // Connetion a la BD
        $connexion = Database::getConnection();
        // Exécuter le SELECT (rechercher enregistrement)
        $requeteSQL = "SELECT * from auteur";
        $requete = $connexion->prepare($requeteSQL);
        $requete->execute();
        $auteursDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        // Mapper les enregistrement vers des objet
        $auteurs = [];
        foreach ($auteursDB as $auteurDB) {
            // Création d'un objet Auteur
            $auteur = $this->toObject($auteurDB);
            $auteurs[] = $auteur;
        }
        // Retourner le résultat (tableau d'objet de la classe Auteur)
        return $auteurs;
    }

    // Méthode permettant de rechercher un Auteur par son ID
    public function FindById(int $id) : ?Auteur {
        $connexion = Database::getConnection();

        $requeteSQL = "SELECT * from auteur where idAuteur = :id";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $auteurDB = $requete->fetch(PDO::FETCH_DEFAULT);

        if (empty($auteurDB)) {
            return null;
        } else {
            $auteur = $this->toObject($auteurDB);
            return $auteur;
        }
    }

    // Méthode permettant de creer un nouvelle auteur dans la BD
    public function create(Auteur $auteur) : void {
        $connexion = Database::getConnection();

        $requeteSQL = "INSERT INTO auteur (prenom,nom) VALUES (:prenom,:nom)";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":prenom",$auteur->getPrenom());
        $requete->bindValue(":nom",$auteur->getNom());
        $requete->execute();
    }

    // Méthode permettant de supprimer un Auteur dans la BD
    public function delete(int $id) : void {
        $connexion = Database::getConnection();

        $requeteSQL = "DELETE FROM auteur where idAuteur = :id";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":id",$id);
        $requete->execute();
    }

    // Méthode de permettant de modifier un auteur
    public function update(Auteur $auteur) : void {
        $connexion = Database::getConnection();

        $requeteSQL = "UPDATE auteur SET prenom = :prenom, nom = :nom where idAuteur = :id";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":prenom",$auteur->getPrenom());
        $requete->bindValue(":nom",$auteur->getNom());
        $requete->bindValue(":id",$auteur->getIdAuteur());
        $requete->execute();
    }

    /**
     * @param mixed $auteurDB
     * @return Auteur
     */
    private function toObject(array $auteurDB): Auteur
    {
        $auteur = new Auteur();
        $auteur->setIdAuteur($auteurDB["idAuteur"]);
        $auteur->setPrenom($auteurDB["prenom"]);
        $auteur->setNom($auteurDB["nom"]);
        return $auteur;
    }
}