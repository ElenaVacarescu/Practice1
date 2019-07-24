<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\people;
use classes\database\Database;
/**
 * Description of Person
 *
 * @author Elena
 */
class Person {
    private static $pplUsingLibrary = 0; //only ppl who want to rent some media
    private static $allPpl = 0; //all ppl with workers
    private $id;
    private $name;
    private $age;
    private $isAdmin;

    public function __construct(string $name, int $age, $isAdmin = 0)
    {
        $this->name = $name;
        $this->age = $age;
        $this->isAdmin = $isAdmin;
        if (!$isAdmin) {
            self::$pplUsingLibrary++;
        }
        $this->id = ++self::$allPpl;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge(): int
    {
        $toReturn = $this->age;
        if ($this->isAdmin) {
            $toReturn = 100; //We want admins to look experienced ;)
        }
        return (int)$toReturn;
    }
    
        public function isAdmin(): int
    {
        $toReturn = $this->isAdmin;
        return (int)$toReturn;
    }
    /**
     * We want to get only client number to see if library is needed
     *
     * @return mixed
     */
    final public static function pplUsingLibrary()
    {
        return self::$pplUsingLibrary;
    }
    /**
     * We want to get number of all ppl connected to library, workers and clients
     *
     * @return mixed
     */
    final public static function allPplUsingLibrary()
    {
        return self::$allPpl;
    }
    
    //functii care tin 

}
