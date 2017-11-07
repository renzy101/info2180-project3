<?php
session_start();
require 'models/login.model.php';

//checks for post request along with login variables
if(isset($_POST['username'], $_POST['pass'])){
    $loginMOD = new loginModel();
    $user = $loginMOD->getUserLoginInfo(strip_tags($_POST['username']));

    if($user !== false){
        if($user['username'] === $_POST['username'] && $user['userpassword'] === $_POST['pass']){
                $_SESSION["user"] = $user['username'];
                header("Location: home");
        }
    }
}else{
    header("Location: login");
}
