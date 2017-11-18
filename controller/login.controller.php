<?php
/*checks for post request along with login variables. Sets sesssion variable with */
session_start();

if(isset($_POST['username'], $_POST['pass']) && !empty($_POST['username']) && !empty($_POST['pass'])){
    require 'models/login.model.php';
    require 'controller/sanitation.php';
    
    $loginMOD = new loginModel();
    $loginDetails = ["username" => $_POST['username'], "pass" => $_POST['pass']];
    $loginDetails = sanitation($loginDetails);
    
    if( $loginMOD->userExist($loginDetails['username']) === false){
        header("Location: login");
    }
    
    $user = $loginMOD->getUserLoginInfo($loginDetails['username']);
    
    if($user !== false){
        if($user['username'] === $_POST['username'] && password_verify( $loginDetails['pass'], "{$user['userpassword']}")){
            $_SESSION['firstname'] = $user['userfname'];
            $_SESSION['lastname'] = $user['userlname'];
            $_SESSION["user"] = $user['username'];
            
            if($_SESSION["user"] === "admin"){
                header("Location: admin");
            }else{
                header("Location: home");
            }
        }else{
            header("Location: login");
        }
    }else{
        header("Location: login");
    }
}else{
    header("Location: login");
}
