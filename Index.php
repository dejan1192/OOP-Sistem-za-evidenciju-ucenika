<?php
require_once "Factory.php";
require_once "StudentFactory.php";
require_once "TeacherFactory.php";
require_once "Random.php";
require "Osoba.php";
require_once "Ucenik.php";
require_once "Dnevnik.php";
require_once "PredmetniNastavnik.php";
require_once "Nastavnik.php";


$dnevnik = Dnevnik::getInstance();

$nastavnici =  TeacherFactory::getInstance()->make(5)->create();


$Razred6 = Factory::create(StudentFactory::class)->make(20)->create(Dnevnik::RAZRED_6);
$Razred5 = Factory::create(StudentFactory::class)->make(20)->create(Dnevnik::RAZRED_5);


$nastavnikBiologije = $dnevnik->dodajNastavnika($nastavnici[0],Dnevnik::PREDMET_BIOLOGIJA );
$nastavnikFizike =  $dnevnik->dodajNastavnika($nastavnici[1], $dnevnik::PREDMET_FIZIKA );
$nastavnikHemije =  $dnevnik->dodajNastavnika($nastavnici[2], $dnevnik::PREDMET_HEMIJA );
$nastavnikIstorije = $dnevnik->dodajNastavnika($nastavnici[3], $dnevnik::PREDMET_ISTORIJA );
$nastavnikMatematike =  $dnevnik->dodajNastavnika($nastavnici[4], $dnevnik::PREDMET_MATEMATIKA);






echo PHP_EOL;
$dnevnik->dodeliRazrednogStaresinu($nastavnikFizike, Dnevnik::RAZRED_5);
echo PHP_EOL;
$dnevnik->dodeliRazrednogStaresinu($nastavnikMatematike, Dnevnik::RAZRED_6);
echo PHP_EOL;




$odsutniUcenici  = Factory::create(StudentFactory::class)->make(2)->create(Dnevnik::RAZRED_6);


//Odsustvo 2 ucenika po 5 casova
for($i = 0; $i < count($odsutniUcenici); $i++){
    echo PHP_EOL;
    $nastavnikBiologije->unesiOdsustvo($odsutniUcenici[$i], Dnevnik::NEOPRAVDANO_ODSUSTVO);
    echo PHP_EOL;
    $nastavnikFizike->unesiOdsustvo($odsutniUcenici[$i], Dnevnik::NEOPRAVDANO_ODSUSTVO);
    echo PHP_EOL;
    $nastavnikHemije->unesiOdsustvo($odsutniUcenici[$i],Dnevnik::NEOPRAVDANO_ODSUSTVO);
    echo PHP_EOL;
    $nastavnikIstorije->unesiOdsustvo($odsutniUcenici[$i],Dnevnik::NEOPRAVDANO_ODSUSTVO );
    echo PHP_EOL;
    $nastavnikMatematike->unesiOdsustvo($odsutniUcenici[$i],Dnevnik::NEOPRAVDANO_ODSUSTVO );
    echo PHP_EOL;
}

// Upisivanje ocena za period od 5 dana..
foreach($dnevnik->getUcenici() as $ucenik){

    for($i = 0; $i< 5 ; $i++ ){
        $date = new DateTime();
        $updated = $date->add(new DateInterval("P".$i."D"));

            echo PHP_EOL;
            $nastavnikBiologije->datum($updated)->oceni($ucenik, rand(1, 5));
            echo PHP_EOL;
            $nastavnikFizike->datum($updated)->oceni($ucenik, rand(1, 5));
            echo PHP_EOL;
            $nastavnikHemije->datum($updated)->oceni($ucenik, rand(1, 5));
            echo PHP_EOL;
            $nastavnikIstorije->datum($updated)->oceni($ucenik, rand(1, 5));
            echo PHP_EOL;
            $nastavnikMatematike->datum($updated)->oceni($ucenik, rand(1, 5));
            echo PHP_EOL;

    }
}




//Prosek svih ucenika
$dnevnik->prosekSvihUcenika();

echo "Prosek razreda 6 ".$dnevnik->prosekOdeljenja(Dnevnik::RAZRED_6);
echo PHP_EOL;
echo "Prosek razreda 5 ".$dnevnik->prosekOdeljenja(Dnevnik::RAZRED_5);


echo PHP_EOL.PHP_EOL;
echo "Razredni staresina za odeljenje 6 je :". $dnevnik->getRazredniStaresinaZaOdeljenje(Dnevnik::RAZRED_6);
echo PHP_EOL;
echo "Razredni staresina za odeljenje 5 je :". $dnevnik->getRazredniStaresinaZaOdeljenje(Dnevnik::RAZRED_5);
