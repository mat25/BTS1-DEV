<?php
require_once 'Inscription.php';

class Formation {
    private string $nomFormation;
    private int $nbPlacesDispo;
    private DateTime $dateDebut;
    private DateTime $dateFin;
    // naviguabilité
    /**
     * @var Inscription[]
     */
    private array $inscriptions;

    /**
     * @param string $nomFormation
     * @param int $nbPlacesDispo
     * @param DateTime $dateDebut
     * @param DateTime $dateFin
     */
    public function __construct(
        string $nomFormation,
        int $nbPlacesDispo,
        string $dateDebut,
        string $dateFin,
    ) {
        $this->nomFormation = $nomFormation;
        $this->nbPlacesDispo = $nbPlacesDispo;
        $this->dateDebut = DateTime::createFromFormat('d/m/Y', $dateDebut);
        $this->dateFin = DateTime::createFromFormat('d/m/Y', $dateFin);
        $this->inscriptions = [];
    }

    public function inscrireSalarie(Salarie $salarie) {
        if (count($this->inscriptions) < $this->nbPlacesDispo) {
            $inscription = new Inscription($salarie);
            $this->inscriptions[] = $inscription;
        }
    }

    /**
     * @return Inscription[]
     */
    public function getInscriptions(): array {
        return $this->inscriptions;
    }

    public function noterSalarie(Salarie $salarie, int $note, string $appreciation) {
        foreach ($this->inscriptions as $inscription) {
            if (
                $salarie->getNom() == $inscription->getSalarie()->getNom() &&
                $salarie->getPrenom() == $inscription->getSalarie()->getPrenom()
            ) {
                $inscription->setAppreciation($appreciation);
                $inscription->setNoteSalarie($note);
            }
        }
    }

    /**
     * @return string
     */
    public function getNomFormation(): string {
        return $this->nomFormation;
    }
}
