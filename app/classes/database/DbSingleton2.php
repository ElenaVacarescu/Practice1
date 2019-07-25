<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\database;

/**
 * Description of DbSingleton2
 *
 * @author Elena
 */
class DbSingleton2 {
    private $_connection;
    private static $_instance; //The single instance
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
   // private $_driver = "mysql";
    private $_database = "outletfashion";
     //pt SQLite, schmbam doar dsl-ul; 
    
    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    // Constructor
    private function __construct()
    {
        try {
            $this->_connection  = new \PDO("mysql:host=$this->_host;dbname=$this->_database", $this->_username, $this->_password);
                     //pt sqlite
                     //$this->db= new PDO('sqlite::memory:', $this->DB_user_name, $this->DB_user_password);
                      //$this->db= new PDO('sqlite: chinook.db', $this->DB_user_name, $this->DB_user_password);
            /*** echo a message saying we have connected ***/
            echo 'Connected to database';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    // Magic method clone is empty to prevent duplication of connection
    private function __clone()
    {
    }
    // Get mysql pdo connection
    public function getConnection()
    {
        return $this->_connection;
    }
}
