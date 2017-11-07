<?php
session_start();
//checks for post request along with login variables
if(isset($_POST['username'], $_POST['pass'])){
    $_SESSION["user"] = $_POST['username'];
    header("Location: home");
}else{
    header("Location: login");
}