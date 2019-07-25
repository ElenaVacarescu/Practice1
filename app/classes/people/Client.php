<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\people;
use classes\database\DbSingleton2;

/**
 * Description of Client
 *
 * @author Elena
 */
class Client extends Person{
    /**
     * Array for all rented media
     *
     * @var array
     */
    private $rented = [];
    private $_dbh;
    /**
     * Client constructor.
     * @param string $name
     * @param int $age
     * @param bool $isAdmin
     */
    public function __construct($name, $age, $isAdmin = false)
    {
        parent::__construct($name, $age, $isAdmin);
        $db = DbSingleton2::getInstance();
        $this->_dbh = $db->getConnection();
    }
    
        public function getClients()
    {
        try {
            /*** The SQL SELECT statement ***/
            $sql = "SELECT * FROM categorii";
            foreach ($this->_dbh->query($sql) as $row) {
                var_dump($row);
            }
            /*** close the database connection ***/
            $this->_dbh = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /**
     * @return array
     * @throws \Exception
     */
    public function getRented(): array  //nu accepta ?array
    {
        if (!empty($_REQUEST['id'])) {
            foreach ($_SESSION['ppl'] as $index => $sessionPerson) {
                if ((int)$_REQUEST['id'] === $sessionPerson->getId()) {
                    $toReturn = $_SESSION['ppl'][$index]['rented'];
                }
            }
            return $toReturn;
        } else {
            echo 'nothing borrowed';
        }
    }
    
}
