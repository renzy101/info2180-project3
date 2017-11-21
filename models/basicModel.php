<?php
class BasicModel{
    protected $connector;
    
    public function __construct(){
        $this->connector = require 'models/DBconnector.php';
    }
    
    public function userExist($user){
        try{
            $userQuery = $this->connector->prepare("SELECT username FROM usrs WHERE username = :user");
            $userQuery->bindParam(':user', $user, PDO::PARAM_STR);
            $userQuery->execute();
            $result = $userQuery->fetch(PDO::FETCH_ASSOC);
            
            return $result;
        }catch(Exception $e){
            return false;
        }
        
    }
    
    public function getAllUserInfo($user){
        try{
            $selectStatement = $this->connector->prepare('SELECT * from usrs WHERE username = :user');
            $selectStatement->bindParam(':user', $user, PDO::PARAM_STR);
            $selectStatement->execute();
            $result = $selectStatement->fetch(PDO::FETCH_ASSOC);
            
            return $result;
        }catch(Exception $e){
            return false;
        }
    }
    
    public function userInfoByID($userID){
        try{
            $usernameQuery = $this->connector->prepare('select * from usrs where userid = :userid');
            $usernameQuery->bindParam(':userid',$userID,PDO::PARAM_STR);
            $usernameQuery->execute();
            $user =  $usernameQuery->fetch(PDO::FETCH_ASSOC);
            
            return $user;
        }catch(Exception $e){
            return false;
        }
        
    }
}