<?php
/*checks for post request along with login variables. Sets sesssion variable with */
session_start();

if(isset($_POST['username'], $_POST['pass']) && !empty($_POST['username']) && !empty($_POST['pass'])){
    require 'models/login.model.php';
    require 'controller/sanitation.php';
    
    $loginMOD = new loginModel();
    $loginDetails = sanitation(["username" => $_POST['username'], "pass" => $_POST['pass']]);
    
    if( $loginMOD->userExist($loginDetails['username'])){
        $user = $loginMOD->getUserLoginInfo($loginDetails['username']);
        
        if($user['username'] === $loginDetails['username'] && password_verify( $loginDetails['pass'], "{$user['userpassword']}")){
            $_SESSION['firstname'] = $user['userfname'];
            $_SESSION['lastname'] = $user['userlname'];
            $_SESSION["user"] = $user['username'];
            
            if($_SESSION["user"] === "admin"){
                echo 1;
                die();
            }else{
                echo 2;
                die();
            }
        }
    }
}

echo "User name or password is incorrect";
