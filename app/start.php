<?php

//require_once __DIR__.'/../vendor/autoload.php';//in caz ca folosesc composer

spl_autoload_register('my_autoloader');

function my_autoloader($class) {
    $file= str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require_once 'app'.DIRECTORY_SEPARATOR.$file.'.php';
   
}

