<?php


class StudentFactory
{

    private  $numberOfObjects = 1;
    private  $students = [];

    public function construct(){}


    public  function create($odeljenje){
        $dnevnik = Dnevnik::getInstance();

        for($i = 0; $i < $this->numberOfObjects ; $i++){
           $this->students[] = $dnevnik->dodajPolaznika(Random::generisiIme(), Random::generisiPrezime(), Random::generisiAdresu(), $odeljenje);
        }
        return $this->students;


    }

    public  function make($numberOfObjects){

        $this->setNumberOfObjects($numberOfObjects);

        return $this;
    }

    /**
     * @param mixed $numberOfObjects
     */
    public  function setNumberOfObjects($numberOfObjects)
    {
        $this->numberOfObjects = $numberOfObjects;
    }



}