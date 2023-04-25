<?php

class Rect {
    // Attribut
    private int $longueur;
    private int $largeur;

    // Methode

    /**
     * @param int $longueur
     * @param int $largeur
     */
    public function __construct(int $longueur, int $largeur)
    {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    /**
     * @return int
     */
    public function getLongueur(): int
    {
        return $this->longueur;
    }

    /**
     * @param int $longueur
     */
    public function setLongueur(int $longueur): void
    {
        $this->longueur = $longueur;
    }

    /**
     * @return int
     */
    public function getLargeur(): int
    {
        return $this->largeur;
    }

    /**
     * @param int $largeur
     */
    public function setLargeur(int $largeur): void
    {
        $this->largeur = $largeur;
    }


}