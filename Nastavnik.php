<?php


class Nastavnik extends Osoba
{
    private $predmet;

    /**
     * Nastavnik constructor.
     *
     */
    public function __construct($ime, $prezime, $adresa)
    {
        parent::__construct($ime, $prezime, $adresa);

    }

    public function __toString()
    {
        return sprintf("
        Ime: %s,
        Prezime: %s,
        Adresa: %s        
        ", $this->getIme(), $this->getPrezime(), $this->getAdresa());
    }

    /**
     * @return mixed
     */
    public function getIme()
    {
        return $this->ime;
    }

    /**
     * @param mixed $ime
     */
    public function setIme($ime)
    {
        $this->ime = $ime;
    }

    /**
     * @return mixed
     */
    public function getPrezime()
    {
        return $this->prezime;
    }

    /**
     * @param mixed $prezime
     */
    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    }

    /**
     * @return mixed
     */
    public function getAdresa()
    {
        return $this->adresa;
    }

    /**
     * @param mixed $adresa
     */
    public function setAdresa($adresa)
    {
        $this->adresa = $adresa;
    }




}