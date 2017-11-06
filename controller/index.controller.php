<?php
session_start();
//redirects user to login view if session is not set

if(!isset($_SESSION['user'])){
    require "views/login.view.php";
}else{
    $user = $_SESSION['user'];
    require "views/index.view.php";
}

//checks for post request along with login variables
if(isset($_POST['username'], $_POST['pass'])){
    $_SESSION["user"] = $_POST['username'];
    $user = $_SESSION['user'];
    require 'views/index.view.php';
}
