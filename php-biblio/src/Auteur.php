<?php

class Auteur {
    private string $prenom;
    private string $nom;

    // On lui dit que l'on va mettre des elements de type Livre dans le tableau
    /*
     * @var Livre[]
     */
    // Association avec la classe Livre 1..*
//    private array $livres;

    /**
     * @param string $prenom
     * @param string $nom
     */
    public function __construct(string $prenom, string $nom)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }



}