<?php

class Evenement {
    private string $nom;
    private string $date;


    public function __construct(string $nom, string $date)
    {
        $this->nom = $nom;
        $this->date = $date;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getNbJours():string {
        $dateEvenement = DateTime::createFromFormat("d/m/Y",$this->date);
        $date = new DateTime();
        $duree = $dateEvenement->diff($date);
        return $duree->days;
    }

    public function getCompteARebours():string {
        $dateEvenement = DateTime::createFromFormat("d/m/Y",$this->date);
        $date = new DateTime();
        $duree = $dateEvenement->diff($date);
        return $duree->format("%a jours, %h heures, %i minutes, %s secondes");
    }





}