<?php


class Ucenik extends Osoba {

    private $ID;
    private $odeljenje;
    private $ocene = [];
    private $odsustva = [];

    /**
     * Ucenik constructor.
     * @param $ime
     * @param $prezime
     * @param $adresa
     * @param $odeljenje
     */
    public function __construct($ime, $prezime, $adresa, $odeljenje)
    {
        parent::__construct($ime, $prezime, $adresa);
        $this->ID = uniqid();
        $this->odeljenje = $odeljenje;
    }

    public function __toString(){
        return sprintf("
        Name:%s %s,
        Odeljenje: %s
        ", $this->getIme(), $this->getPrezime(), $this->getOdeljenje());
    }

    /**
     * @return mixed
     */
    public function odsutan($datum, $predmet){

        if(isset($this->getOdsustva()[$datum][$predmet]) && $this->getOdsustva()[$datum][$predmet] === Dnevnik::NEOPRAVDANO_ODSUSTVO){
            return true;
        }
        return false;
    }

    public function svaOdsustva(){
    foreach ($this->odsustva as $datum => $predmeti){
        echo "Ucenik ".$this->getIme() . " " . $this->getPrezime() ." ima neopravdano odsustvo iz predmeta: ".PHP_EOL;
        foreach($predmeti as $key=>$value){
            echo $key. " dana ". $datum . PHP_EOL;
        }
    }

    }
    public function getOdeljenje()
    {
        return $this->odeljenje;
    }

    /**
     * @param mixed $odeljenje
     */
    public function setOdeljenje($odeljenje)
    {
        $this->odeljenje = $odeljenje;
    }


    public function getOcene()
    {
        return $this->ocene;
    }

    /**
     * @param array $ocene
     */
    public function setOcene($ocene, $predmet)
    {

        $this->ocene[$predmet] = $ocene;

    }

    /**
     * @return array
     */
    public function getOdsustva()
    {
        return $this->odsustva;
    }

    /**
     * @param array $odsustva
     */
    public function setOdsustva($predmet, $tip)
    {
        $this->odsustva[date("d/m/Y")][$predmet] =  $tip;
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




}