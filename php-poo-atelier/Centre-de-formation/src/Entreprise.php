<?php

class Entreprise {
    private string $nomEntreprise;
    private string $rueEntreprise;
    private int $CPEntreprise;
    private string $villeEntreprise;

    /**
     * @param string $nomEntreprise
     * @param string $rueEntreprise
     * @param int $CPEntreprise
     * @param string $villeEntreprise
     */
    public function __construct(
        string $nomEntreprise,
        string $rueEntreprise,
        int $CPEntreprise,
        string $villeEntreprise,
    ) {
        $this->nomEntreprise = $nomEntreprise;
        $this->rueEntreprise = $rueEntreprise;
        $this->CPEntreprise = $CPEntreprise;
        $this->villeEntreprise = $villeEntreprise;
    }
}
