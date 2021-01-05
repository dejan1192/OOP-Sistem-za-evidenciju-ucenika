<?php


class Factory
{


    public static function create($className){

        switch($className){
            case  'student':
                return new StudentFactory;
            case 'teacher': 
                return new TeacherFactory;
            default:
                throw new Exception("Invalid type");
        }
    }
}