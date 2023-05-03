<?php

class Auteur {
    private string $prenom;
    private string $nom;

    // On lui dit que l'on va mettre des elements de type Livre dans le tableau
    /*
     * @var Livre[]
     */
    // Association avec la classe Livre 1..*
    private array $livres;
}