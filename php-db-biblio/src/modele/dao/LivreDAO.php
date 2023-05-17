<?php
require_once "./src/modele/entites/Livre.php";
require_once "./src/modele/entites/Auteur.php";
require_once "./src/modele/config/Database.php";

class LivreDAO {



    public function findAll():array {
        $connexion = Database::getConnection();
        $requeteSQL = "SELECT isbn,titre,dateParution,nbPages,a.idAuteur,a.prenom,a.nom FROM `livre` INNER JOIN auteur as a on livre.idAuteur = a.idAuteur";
        $requete = $connexion->prepare($requeteSQL);
        $requete->execute();
        $livresDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        $livres = [];

        foreach ($livresDB as $livreDB) {
            $livre = $this->toObject($livreDB);
            $livres[] = $livre;
        }
        return $livres;
    }

    public function FindByIsbn(string $isbn) : ?livre {
        $connexion = Database::getConnection();
        $requeteSQL = "SELECT isbn,titre,dateParution,nbPages,a.idAuteur,a.prenom,a.nom FROM `livre` INNER JOIN auteur as a on livre.idAuteur = a.idAuteur where isbn = :isbn";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":isbn",$isbn);
        $requete->execute();
        $livresDB = $requete->fetch(PDO::FETCH_ASSOC);

        if (empty($livresDB)) {
            return null;
        } else {
            $livre = $this->toObject($livresDB);
            return $livre;
        }
    }

    public function create(Auteur $auteur) : void {

    }

    public function delete(int $id) : void {

    }

    public function update(Auteur $auteur) : void {

    }

    private function toObject(array $livreDB): Livre
    {
        $livre = new Livre();
        $livre->setIsbn($livreDB["isbn"]);
        $livre->setTitre($livreDB["titre"]);
        $livre->setDateParution(DateTime::createFromFormat("Y-m-d",$livreDB["dateParution"]));
        $livre->setNbPages($livreDB["nbPages"]);
        $auteur = new Auteur();
        $auteur->setIdAuteur($livreDB["idAuteur"]);
        $auteur->setPrenom($livreDB["prenom"]);
        $auteur->setNom($livreDB["nom"]);
        $livre->setAuteur($auteur);
        return $livre;
    }
}