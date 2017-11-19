<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: /');
}elseif($_SESSION['user'] == 'admin' && $_SERVER['REQUEST_METHOD'] == 'POST'){
    
    require "models/signup.model.php";
    require "controller/sanitation.php";
    require 'controller/verification.php';
    
    $signupMOD = new signupModel();
    
    if($signupMOD->userExist($_POST['username'])){
        print "User name already in use";
    }else{
        //packaging user data
        $userData = ["firstname" => $_POST['firstname'], "lastname" =>  $_POST['lastname'], "username" => $_POST['username'], "signpass" => $_POST['signpass']];
        //data sanitation
        $userData = sanitation($userData);
        
        userDataValidation($userData);
        
        $result = $signupMOD->addUser($userData['firstname'], $userData['lastname'], $userData['username'], $userData['signpass']);
        
        if($result){
            print "User Successfuly added";
        }else{
            print "User Not added";
        }
    } 
    
}else{
    header('Location: /');
}

