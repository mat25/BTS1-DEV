<?php

class DateFr {
    private DateTime $date;

    public function __construct(string $date)
    {
        $this->date = DateTime::createFromFormat("d/m/Y",$date);
    }

    public function format() : string {
        return $this->date->format("d/m/Y");
    }

    public function ajouterMois(int $nbDeMois) : void {
        $duree = new DateInterval("P{$nbDeMois}M");
        $this->date->add($duree);
    }

    public function ajouterJour(int $nbDeJour) : void {
        $duree = new DateInterval("P{$nbDeJour}D");
        $this->date->add($duree);
    }

    public function soustraireJours(int $nbDeJour) : void {
        $duree = new DateInterval("P{$nbDeJour}D");
        $this->date->sub($duree);
    }

    public function soustraireMois(int $nbDeMois) : void {
        $duree = new DateInterval("P{$nbDeMois}M");
        $this->date->sub($duree);
    }

    /**
     * @return DateTime|false
     */
    public function getDate(): DateTime|bool
    {
        return $this->date;
    }

    public function diffJours(DateFr $date): int  {
        $duree =  $this->date->diff($date->getDate());
        return $duree->days;
    }

}