<?php
require 'config/dbconfig.php';

try{
    $connector = new PDO(
        $config['connectionString'].';dbname='.$config['dbname'],
        $config['username'],
        $config['password']
        );
    
    return $connector;
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}