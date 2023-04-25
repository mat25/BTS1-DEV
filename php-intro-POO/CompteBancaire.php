<?php


class CompteBancaire
{
    private string $numeroDeCompte;
    private string $titulaire;
    private float $solde;

    private int $decouvert;
    private string $dateCreation;
    private bool $compteGold;


    public function __construct(string $titulaire,$dateCreation)
    {
        $numero = rand(10000000, 99999999);
        $this->numeroDeCompte = "FR-" . $numero;
        $this->titulaire = $titulaire;
        $this->solde = 0;
        $this->decouvert = 100;
//        $this->dateCreation = date("Y-m-d");
        $this->dateCreation = $dateCreation;
        $this->compteGold = false;
    }

    public function addsolde(float $somme) :void
    {
        $this->solde += $somme;
    }

    public function removeSolde(float $somme) :void
    {
        if ($somme <= $this->solde + $this->decouvert) {
            $this->solde -= $somme;
        }
    }

    public function voirCompte(): string
    {
        if ($this->compteGold == false) {
            $gold = "";
        } else {
            $gold = "Compte gold";
        }
        return "Numéro de compte : ".$this->numeroDeCompte.PHP_EOL
            ."Titulaire : ".$this->titulaire.PHP_EOL
            ."Solde : ".$this->solde.PHP_EOL
            ."Découvert autorisé : ".$this->decouvert.PHP_EOL
            .$gold;
    }

    public function verifCompteGold():void {
        $age = date("Y") - date("Y",strtotime($this->dateCreation));
        if (date("md") < date("md",strtotime($this->dateCreation))) {
            $age -= 1;
        }
        if ($age >= 10) {
            $this->compteGold = true;
        }
    }

    public function virementEntreCompte($compte2,$montant) {
        if ($montant <= $this->solde + $this->decouvert) {
            $this->removeSolde($montant);
            $compte2->addsolde($montant);
        }
    }

}