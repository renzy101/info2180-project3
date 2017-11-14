<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}elseif($_SESSION['user'] == 'admin' && $_SERVER['REQUEST_METHOD'] == 'POST'){
    
    require "models/signup.model.php";
    require "controller/sanitation.php";
    
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
    header("Location: index.php");
}

function userDataValidation($userData){
    if(isset($userData['firstname'],$userData['lastname'], 
    $userData['username'], $userData['signpass']) 
    && !empty($userData['firstname']) && !empty($userData['lastname']) 
    && !empty($userData['username']) && !empty($userData['signpass']) ){
        $noSpecialChar = "/[-!$%^&*()_+|~=`{}\[\]:\";'<>?,.\/]/";
        $passwordReg = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/";
        if(preg_match($noSpecialChar, $userData['firstname'])){
            echo 'Fistname, lastname and username should only have lowercase letters, uppercase letter and numbers';
            die();
        }elseif(preg_match($noSpecialChar, $userData['lastname'])){
            echo 'Fistname, lastname and username should only have lowercase letters, uppercase letter and numbers';
            die();
        }elseif(preg_match($noSpecialChar, $userData['username'])){
            echo 'Fistname, lastname and username should only have lowercase letters, uppercase letter and numbers';
            die();
        }elseif(!preg_match($passwordReg, $userData['signpass'])){
            echo "Password should be 8 charachters in legnth, containing at least 1 digit and 1 capital letter";
            die();
        }
    }else{
        echo "Please fill in all fields";
        die();
    }
}
