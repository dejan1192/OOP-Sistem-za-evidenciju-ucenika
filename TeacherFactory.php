<?php


class TeacherFactory
{
    public static $instance;
    public static $numberOfObjects = 1;
    public static $teachers = [];

    private function __construct(){}

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new TeacherFactory();
        }
        return self::$instance;
    }

    public static function create(){

        for ($i= 0; $i < self::$numberOfObjects ; $i++){
               self::$teachers[] = new Nastavnik(Random::generisiIme(), Random::generisiPrezime(), Random::generisiAdresu());

        }
        return self::$teachers;
    }

    public static function make($num){
       self::setNumberOfObjects($num);
        return self::$instance;
    }

    /**
     * @param int $numberOfObjects
     */
    public static function setNumberOfObjects(int $numberOfObjects)
    {
        self::$numberOfObjects = $numberOfObjects;
    }


}