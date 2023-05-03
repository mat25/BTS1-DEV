<?php
require_once "./Phrase.php";

class Texte
{


    public function __construct() {
        $this->texte = [];
    }

    public function addPhraseString($phrase) {
        $this->texte[] = new Phrase($phrase);
    }

    public function addPhraseClass($phrase) {
        $this->texte[] = $phrase;
    }
}