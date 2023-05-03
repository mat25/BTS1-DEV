<?php
require_once "./Auteur.php";

class Livre {
    private string $isbm;
    private string $titre;
    private int $nbPages;
    private DateTime $dateParution;

    // Association avec la classe Auteur 1..1
    private Auteur $auteur;

    /**
     * @param Auteur $auteur
     */
    public function setAuteur(Auteur $auteur): void
    {
        $this->auteur = $auteur;
    }


}