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
            
            if($result){
                return true;
            }
            return false;
        }catch(Exception $e){
            return false;
        }
        
    }
    
    protected function getAllUserInfo($user){
        if($this->userExist($user)){
            try{
                $selectStatement = $this->connector->prepare('SELECT * from usrs WHERE username = :user');
                $selectStatement->bindParam(':user', $user, PDO::PARAM_STR);
                $selectStatement->execute();
                $result = $selectStatement->fetch(PDO::FETCH_ASSOC);
                
                if($result){
                    return $result;
                }
            }catch(Exception $e){
                return false;
            }
        }
        return false;
    }
}