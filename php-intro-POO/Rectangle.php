<?php

class Rectangle
{
    // Attributs
    private int $longueur;
    private int $largeur;
    private string $couleurFond;

    // Méthodes
    public function __construct(int $longueur,int $largeur)
    {
        if ($largeur > 0) {
            $this->largeur = $largeur;
        } else {
            $this->largeur = 0;
        }
        if ($longueur > 0) {
            $this->longueur = $longueur;
        } else {
            $this->longueur = 0;
        }
        $this->couleurFond = "noir";
    }
    // Acesseur pour l'attibut longueur (Lecture ou getter)
    public function getLongueur():int {
        return $this->longueur;
    }

    // Acesseur pour l'attibut largueur (Lecture ou getter)
    public function getLargeur():int {
        return $this->largeur;
    }

    // Acesseur pour l'attibut Couleur (Lecture ou getter)
    public function getCouleurFond(): int|string
    {
        return $this->couleurFond;
    }

    // Mutateur pour l'attibut longueur (Ecriture, modification ou  setter)
    public function setLongueur(int $longueur):void {
        if ($longueur > 0) {
            $this->longueur = $longueur;
        }
    }

    // Mutateur pour l'attibut largeur(Ecriture, modification ou setter)
    public function setLargeur(int $largeur):void {
        if ($largeur > 0) {
            $this->largeur = $largeur;
        }
    }

    // Mutateur pour l'attibut Couleur(Ecriture, modification ou setter)
    public function setCouleurFond(string $couleurFond): void
    {
        $this->couleurFond = $couleurFond;
    }

    public function calculerSurfaces() : int {
        return $this->largeur * $this->longueur;
    }

    public function CalculerPerimetre(): int {
        return $this->largeur * 2 + $this->longueur *2;
    }

    public function setDonnee():string {
        return "Dimension = ".$this->longueur." * ".$this->largeur.PHP_EOL."Couleur de fond = ".$this->couleurFond;
    }

}