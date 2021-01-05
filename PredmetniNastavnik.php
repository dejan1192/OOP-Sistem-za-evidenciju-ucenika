<?php


class PredmetniNastavnik
{
    private $nastavnik;
    private $predmet;

    private $datum;



    /**
     * PredmetniNastavnik constructor.
     * @param $nastavnik
     * @param $predmet
     */
    public function __construct($nastavnik, $predmet)
    {
        $this->nastavnik = $nastavnik;
        $this->predmet = $predmet;
    }

    public function oceni(Ucenik $ucenik, $ocena){
      if(!isset($this->datum)) {
          $datum = new DateTime();
      }else {
          $datum = $this->datum;
      }

        if($ucenik->odsutan($datum->format('d/m/Y'),$this->getPredmet())){
            printf("Ucenik %s nije prisustvovao casu %s, zbog cega nije ocenjen dana %s. ", $ucenik->getIme(), $this->getPredmet(), $datum->format('d/m/Y'));
            return;
        }
        $ucenik->setOcene($ocena, $this->getPredmet());
        echo "Uceniku ". $ucenik->getIme() . " je upisana ocena ".$ocena. " iz predmeta " . $this->getPredmet(). " dana ". $datum->format('d/m/Y');;

    }

    public function datum($date){

        $this->datum = $date;

        return $this;

    }

    public function unesiOdsustvo(Ucenik $ucenik, $tipOdsustva){
        $ucenik->setOdsustva($this->getPredmet(), $tipOdsustva);
        echo "Ucenik ". $ucenik->getIme() . " " . $ucenik->getPrezime() ." je ". $tipOdsustva . " odsustvovao sa casa dana " . date('d/m/Y');;
    }

    public function __toString()
    {
        return  sprintf("
        Ime i prezime: %s %s,
        predmet: %s
        " ,$this->getNastavnik()->getIme(), $this->getNastavnik()->getPrezime(), $this->getPredmet());

    }
    public function getNastavnik()
    {
        return $this->nastavnik;
    }

    /**
     * @param mixed $nastavnik
     */
    public function setNastavnik($nastavnik)
    {
        $this->nastavnik = $nastavnik;
    }

    /**
     * @return mixed
     */
    public function getPredmet()
    {
        return $this->predmet;
    }

    /**
     * @param mixed $predmet
     */
    public function setPredmet($predmet)
    {
        $this->predmet = $predmet;
    }




}