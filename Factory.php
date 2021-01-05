<?php


class Factory
{


    public static function create($className){

        return new $className;
    }
}