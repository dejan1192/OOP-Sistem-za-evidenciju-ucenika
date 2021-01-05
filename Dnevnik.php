<?php


class Dnevnik
{
    private $nastavnici = [];
    private $ucenici = [];
    private $razredni = [];
    private static $instancaDnevnik = null;

    const PREDMET_BIOLOGIJA = "Biologija";
    const PREDMET_ISTORIJA = "Istorija";
    const PREDMET_HEMIJA = "Hemija";
    const PREDMET_FIZIKA = "Fizika";
    const PREDMET_MATEMATIKA = "Matematika";

    const OPRAVDANO_ODSUSTVO = "OPRAVDANO";
    const NEOPRAVDANO_ODSUSTVO = "NEOPRAVDANO";

    const RAZRED_5 = "Razred 5";
    const RAZRED_6 = "Razred 6";



    private function __construct(){}


    public static function getInstance(){
        if(!self::$instancaDnevnik){
            self::$instancaDnevnik =  new Dnevnik();
        }
        return self::$instancaDnevnik;

    }

    public function dodajNastavnika(Nastavnik $nastavnik, $predmet):PredmetniNastavnik
    {


        $predmetniNastavnik = new PredmetniNastavnik($nastavnik, $predmet);
        $this->nastavnici[] = $predmetniNastavnik;
        return $predmetniNastavnik;
    }

    public function dodajPolaznika($ime, $prezime, $adresa, $odeljenje){

       $ucenik = new Ucenik($ime, $prezime, $adresa, $odeljenje);
        $this->ucenici[] = $ucenik;

        return $ucenik;
    }

    public function dodeliRazrednogStaresinu(PredmetniNastavnik $predmetniNastavnik, $odeljenje){

        $this->razredni[$odeljenje] = $predmetniNastavnik;
        printf("Nastavnik %s %s je razredni staresina %s",$predmetniNastavnik->getNastavnik()->getIme(), $predmetniNastavnik->getNastavnik()->getPrezime(), $odeljenje);


    }

    public function oceniPredmet( $predmet, Ucenik $ucenik, $ocena){
        foreach($this->getNastavnici() as $nastavnik){
            if($nastavnik->getPredmet() === $predmet){
                $nastavnik->oceni($ucenik, $ocena);
            }
        }
    }

    public function getRazredniStaresinaZaOdeljenje($odeljenje){
        return $this->razredni[$odeljenje] ?? null;
    }

    public function prosekOdeljenja($odeljenje){
        $prosekrazreda =0;
        $brojac = 0;
        foreach ($this->getUcenici() as $ucenik){

            if($ucenik->getOdeljenje() === $odeljenje){

                $brojac++;
                $avg = array_sum($ucenik->getOcene()) / count($ucenik->getOcene());
                $prosekrazreda+=$avg;
            }

        }

       return $prosekrazreda / $brojac;
    }

    public function prosekSvihUcenika(){


        foreach($this->getUcenici() as $ucenik){
            echo PHP_EOL;

            $avg = array_sum($ucenik->getOcene()) / count($ucenik->getOcene());

            echo "Prosek ocena ucenika: " . $ucenik->getIme() . "  " . $ucenik->getPrezime() . " je : " .$avg.PHP_EOL;
            $ucenik->svaOdsustva();
            echo PHP_EOL;
        }
    }

    /**
     * @return array
     */
    public function getNastavnici()
    {
        return $this->nastavnici;
    }

    /**
     * @param array $nastavnici
     */
    public function setNastavnici($nastavnici)
    {
        $this->nastavnici = $nastavnici;
    }

    /**
     * @return array
     */
    public function getUcenici()
    {
        return $this->ucenici;
    }

    /**
     * @param array $ucenici
     */
    public function setUcenici($ucenici)
    {
        $this->ucenici = $ucenici;
    }

    /**
     * @return array
     */
    public function getRazredni()
    {
        return $this->razredni;
    }

    /**
     * @param array $razredni
     */
    public function setRazredni($razredni)
    {
        $this->razredni = $razredni;
    }

}