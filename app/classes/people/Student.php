<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\people;

/**
 * Description of Student
 *
 * @author Elena
 */
class Student extends Client{
   public function __construct($name, $age, $isAdmin = false)
    {
        parent::__construct($name, $age, $isAdmin);
    }
}
