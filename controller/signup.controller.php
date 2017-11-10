<?php
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}elseif($_SESSION['user'] == 'admin'){
    //add check for post message with set user variables;
    require "models/signup.model.php";
    
    $signupMOD = new signupModel();
    
    if($signupMOD->userExist($_POST['username'])){
        print "User name already in use";
    }else{
        //validate user data
        $result = $signupMOD->addUser($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['signpass']);
        
        if($result){
            print "User Successfuly added";
        }else{
            print "User Not added";
        }
    }
    
    
}else{
    header("Location: index.php");
}