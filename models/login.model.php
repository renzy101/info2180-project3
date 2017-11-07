<?php

class loginModel{
    private $connector;
    
    public function __construct(){
        $this->connector = require 'models/DBconnector.php';
    }
    
    public function getUserLoginInfo($user){
        $selectStatement = $this->connector->prepare('SELECT username, userpassword from usrs WHERE username = :user');
        $selectStatement->bindParam(':user', $user, PDO::PARAM_STR);
        if($selectStatement->execute()){
            return $selectStatement->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
}