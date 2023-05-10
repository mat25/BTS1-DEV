<?php

class Categorie {
    private string $nomCategorie ;

    /**
     * @param string $nomCategorie
     */
    public function __construct(string $nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;
    }

    /**
     * @return string
     */
    public function getNomCategorie(): string
    {
        return $this->nomCategorie;
    }




}