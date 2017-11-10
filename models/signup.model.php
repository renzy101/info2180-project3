<?php

class signupModel{
    private $connector;
    
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
    
    public function addUser($firstname, $lastname, $username, $signpass){
        try{
            $signpass = password_hash($signpass, PASSWORD_BCRYPT);
            $userInsert = $this->connector->prepare('INSERT INTO usrs(userfname, userlname,username,userpassword) VALUES(:fname, :lname, :username, :pass)');
            
            $userInsert->bindParam(':fname', $firstname, PDO::PARAM_STR);
            $userInsert->bindParam(':lname', $lastname, PDO::PARAM_STR);
            $userInsert->bindParam(':username', $username, PDO::PARAM_STR);
            $userInsert->bindParam(':pass', $signpass, PDO::PARAM_STR);
            
            if($userInsert->execute()){
                return true;
            }
            return false;
        }catch(Exception $e){
            return false;
        }
    }
}