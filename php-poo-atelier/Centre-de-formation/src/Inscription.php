<?php
require_once 'Salarie.php';

class Inscription {
    private int $noteSalarie;
    private string $appreciation;

    private Salarie $salarie;

    /**
     * @param int $noteSalarie
     * @param string $appreciation
     */
    public function __construct(
        Salarie $salarie,
        ?int $noteSalarie = -1,
        ?string $appreciation = '',
    ) {
        $this->noteSalarie = $noteSalarie;
        $this->appreciation = $appreciation;
        $this->salarie = $salarie;
    }

    /**
     * @return int|null
     */
    public function getNoteSalarie(): ?int {
        return $this->noteSalarie;
    }

    /**
     * @return string|null
     */
    public function getAppreciation(): ?string {
        return $this->appreciation;
    }

    /**
     * @return Salarie
     */
    public function getSalarie(): Salarie {
        return $this->salarie;
    }

    /**
     * @param int|null $noteSalarie
     */
    public function setNoteSalarie(?int $noteSalarie): void {
        $this->noteSalarie = $noteSalarie;
    }

    /**
     * @param string|null $appreciation
     */
    public function setAppreciation(?string $appreciation): void {
        $this->appreciation = $appreciation;
    }
}
