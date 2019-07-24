<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\database;
use PDO;
use PDOException;
/**
 * Description of Db2
 *
 * @author Elena
 */
class Db2 {
    public $_connection;
    
    private static $instance;
    
     private $DB_host = "localhost";
     private $DB_user_name = "root";
     private $DB_user_password = "";
     private $DB_driver = "mysql"; //de vazut daca merge cu 'mysqlitedb'
     private $DB_database = "outletfashion";
     
     //$dns = $this->DB_driver.':host='.$this->DB_user_name.';dbname='.$this->DB_database;

    private function __construct()
    {
        try
        {
            	$this->_connection= new PDO($this->DB_driver.':host='.$this->DB_host.';dbname='.$this->DB_database, $this->DB_user_name, $this->DB_user_password);
                //$this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }  catch(PDOException $e)
        {
            echo $e->getMessage();
        }

    }
	
	   /* 
      * Like the constructor, we make __clone private so nobody can clone the instance 
      */ 
     private function __clone() {} 
	 
	/*
	*prevent from being unserialized
	*/
    private function __wakeup(){}
 
    //singleton pattern
    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
}
