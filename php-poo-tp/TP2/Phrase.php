<?php

class Phrase {
    private string $phrase;


    public function __construct(string $phrase)
    {
        $this->phrase = $phrase;
    }

    public function toString(): string
    {
        return $this->phrase;
    }

    public function calculerNombreMots():int {
        return str_word_count($this->phrase);
    }

    public function getMotPosition(int $position): string {
        $listeMot = str_word_count($this->phrase,1);
        if ($position > count(str_word_count($this->phrase,1)) || ($position <= 0)) {
            return "Aucun mot a cette position";
        } else {
            return $listeMot[$position-1];
        }
    }

    public function getType() :string {
        if (substr($this->phrase,-1) == ".") {
            return "Phrase déclarative";
        } elseif (substr($this->phrase,-1) == "?") {
            return "Phrase interrogative";
        }  elseif (substr($this->phrase,-1) == "!") {
            return "Phrase exclamative";
        } else {
            return "La phrase ne se termine pas par un point.";
        }
    }

    public function calculerNombreLettres() :int {
        return strlen($this->phrase) - substr_count($this->phrase," ");
    }

    public function getMotOccurrences(string $mot) : int {
        return substr_count($this->phrase,$mot);
    }

}