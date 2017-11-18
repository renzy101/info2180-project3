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
    require 'views/error404.view.php';
    die();
}