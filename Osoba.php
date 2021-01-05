<?php


class Osoba {

    protected $ime;
    protected $prezime;
    protected $adresa;

    /**
     * Osoba constructor.
     * @param $ime
     * @param $prezime
     * @param $adresa
     */
    public function __construct($ime, $prezime, $adresa)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->adresa = $adresa;
    }


}