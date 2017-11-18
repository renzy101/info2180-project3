<?php
require 'models/basicModel.php';

class loginModel extends BasicModel{

    public function getUserLoginInfo($user){
        try{
            $selectStatement = $this->connector->prepare('SELECT * from usrs WHERE username = :user');
            $selectStatement->bindParam(':user', $user, PDO::PARAM_STR);
            $selectStatement->execute();
            $result = $selectStatement->fetch(PDO::FETCH_ASSOC);
            
            if($result){
                return $result;
            }
            return false;
        }catch(Exception $e){
            return false;
        }
    }
}