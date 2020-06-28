<?php

session_start();
ob_start();

function load_class($class_name){
    require __DIR__ . '/classes' . strtolower($class_name) . '.php';
}
spl_autoload_register('load_class');

$config = require __DIR__. '/config.php';

try {
    $db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'], $config['db']['user'], $config['db']['pass']);
}catch (PDOException $e){
    die($e->getMessage());
}

foreach (glob(__DIR__. '/helper/*.php') as $helper_file){
    require $helper_file;
}
