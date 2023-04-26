<?php

class Evenement {
    private string $nom;
    private DateTime $date;


    public function __construct(string $nom, string $date)
    {
        $this->nom = $nom;
        $this->date =  DateTime::createFromFormat("d/m/Y",$date);
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDate(): string
    {
        return $this->date->format("d/m/Y");
    }

    public function getNbJours():int {
        $date = new DateTime();
        $duree = $this->date->diff($date);
        return $duree->days;
    }

    public function getCompteARebours():string {
        $date = new DateTime();
        $duree = $this->date->diff($date);
        return $duree->format("%a jours, %h heures, %i minutes, %s secondes");
    }
}