<?php
require_once "Auteur.php";
require_once "Categorie.php";
require_once "Editeur.php";

class Livre {
    private string $isbm;
    private string $titre;
    private int $nbPages;
    private DateTime $dateParution;

    // Association avec la classe Auteur 0..1
    private ?Auteur $auteur;
    private Editeur $editeur;
    private Categorie $categorie;

    /**
     * @param string $isbm
     * @param string $titre
     * @param int $nbPages
     * @param DateTime $dateParution
     * @param Auteur $auteur
     */
    public function __construct(string $isbm, string $titre, int $nbPages, DateTime $dateParution, ?Auteur $auteur=null, Editeur $editeur, Categorie $categorie)
    {
        $this->isbm = $isbm;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->dateParution = $dateParution;
        $this->auteur = $auteur;
        $this->editeur = $editeur;
        $this->categorie = $categorie;
    }

    /**
     * @param Auteur|null $auteur
     */
    public function setAuteur(?Auteur $auteur): void
    {
        $this->auteur = $auteur;
    }


    /**
     * @return string
     */
    public function getIsbm(): string
    {
        return $this->isbm;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @return int
     */
    public function getNbPages(): int
    {
        return $this->nbPages;
    }

    /**
     * @return DateTime
     */
    public function getDateParution(): DateTime
    {
        return $this->dateParution;
    }

    /**
     * @return Auteur
     */
    public function getAuteur(): Auteur
    {
        return $this->auteur;
    }

    /**
     * @return Editeur
     */
    public function getEditeur(): Editeur
    {
        return $this->editeur;
    }

    /**
     * @return Categorie
     */
    public function getCategorie(): Categorie
    {
        return $this->categorie;
    }






}