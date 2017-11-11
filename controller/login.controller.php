<?php
/*checks for post request along with login variables. Sets sesssion variable with */
session_start();
require 'models/login.model.php';

if(isset($_POST['username'], $_POST['pass'])){
    $loginMOD = new loginModel();
    $user = $loginMOD->getUserLoginInfo(strip_tags($_POST['username']));
    
    if($user !== false){
        if($user['username'] === $_POST['username'] && password_verify(strip_tags($_POST['pass']), "{$user['userpassword']}")){
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
