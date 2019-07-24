<?php
//https://github.com/bogoyski/PHP-OOP-Workshop-Application/blob/master/Service/City/CityService.php

use classes\media\Cd;
use classes\media\Media;
use classes\people\Person;
use classes\database\Database;
require_once "app\start.php";
//aici instantiez obiectele claselor

$cd=new Cd ('La dolce vita', 'Bon Jovi', ['song1', 'song2'],false);
print_r($cd->getArtist());
//string $title, string $artist, array $songs = [], $isCheckOut = false


/**
 * Show current status about ppl
 */
echo "<h2>Info</h2>";
$allPpl = Person::allPplUsingLibrary();
$clients = Person::pplUsingLibrary();
$workers = $allPpl - $clients;
echo sprintf("<p>We have %d people (that contains %d admin workers)</p>", $allPpl, $workers);
/**
 * Show current status about media
 */
echo sprintf("<p>We have %d Media in library</p>", Media::getMediaCount());


//test mysql
$crud=new Database();

$records = $crud->rawSelect('SELECT * FROM branduri');

$rows = $records->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $row)
    {
        foreach($row as $fieldname=>$value)
        {
            echo $fieldname.' = '.$value.'<br />';
        }
        echo '<hr />';
    }

    //test SQLite
//creez tabela daca nu o am; daca o am doar inserez noul obiect creat
    $sql = "CREATE TABLE clients (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nume TEXT,
    age INTEGER,
    isAdmin INTEGER
    )";

   // $crud->exec($sql);

    /*** insert values into db ***/
    $client1=new classes\people\Client('Ion Ion', 22, 0);
    $client2=new classes\people\Client('Cristian Vasilw', 40, 1);
    //pt inserare
    $values = array(
        array('name'=>$client1->getName(), 'age'=>$client1->getAge(), 'isAdmin'=>$client1->isAdmin()),
        array('name'=>$client2->getName(), 'age'=>$client2->getAge(), 'isAdmin'=>$client2->isAdmin())
        );

    $crud->dbInsert('clients', $values);

    $rez = $crud->rawSelect('SELECT * FROM clients');
    $rows2 = $rez->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows2 as $row2)
    {
        foreach($row2 as $fieldname2=>$value2)
        {
            echo $fieldname2.' = '.$value2.'<br />';
        }
        echo '<hr />';
    }
    
    /////////////////crud test//////////////////////////
    
    error_reporting(E_ALL);

    include 'crud.class.php';

    $crud = new crud;
    $crud->dsn = "sqlite::memory:";

    $sql = "CREATE TABLE animals (
    animal_id INTEGER PRIMARY KEY AUTOINCREMENT,
    animal_name TEXT,
    animal_type TEXT
    )";

    $crud->rawQuery($sql);

    /*** insert values into db ***/
    $values = array(
        array('animal_name'=>'bruce', 'animal_type'=>'dingo'),
        array('animal_name'=>'bruce', 'animal_type'=>'wombat'),
        array('animal_name'=>'bruce', 'animal_type'=>'kiwi'),
        array('animal_name'=>'bruce', 'animal_type'=>'kangaroo')
        );

    $crud->dbInsert('animals', $values);

    $records = $crud->rawSelect('SELECT * FROM animals');
    $rows = $records->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row)
    {
        foreach($row as $fieldname=>$value)
        {
            echo $fieldname.' = '.$value.'<br />';
        }
        echo '<hr />';
    }


    /*** update ***/
    $crud->dbUpdate('animals', 'animal_name', 'troy', 'animal_id', 3);

    /*** retrieve a single record ***/
    $res = $crud->dbSelect('animals', 'animal_id', 3 );
    foreach($res as $row)
    {
        echo $row['animal_name'].' = '.$row['animal_type'].'<br />';
    }
    
    /*
// Require the person class file
   require("Person.class.php");
	
// Instantiate the person class
   $person  = new Person();
// Create new person
   $person->Firstname = "Kona";
   $person->Age  = "20";
   $person->Sex = "F";
   $creation = $person->Create();
// Update Person Info
   $person->id = "4";	
   $person->Age = "32";
   $saved = $person->Save(); 
// Find person
   $person->id = "4";		
   $person->Find();
   d($person->Firstname, "Person->Firstname");
   d($person->Age, "Person->Age");
// Delete person
   $person->id = "17";	
   $delete = $person->Delete();
 // Get all persons
   $persons = $person->all();  
   // Aggregates methods 
   d($person->max('age'), "Max person age");
   d($person->min('age'), "Min person age");
   d($person->sum('age'), "Sum persons age");
   d($person->avg('age'), "Average persons age");
   d($person->count('id'), "Count persons");
   function d($v, $t = "") 
   {
      echo '<pre>';
      echo '<h1>' . $t. '</h1>';
      var_dump($v);
      echo '</pre>';
   }
     *      */

    

