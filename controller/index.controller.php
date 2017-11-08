<?php
session_start();
//redirects user to login view if session is not set

if(!isset($_SESSION['user'])){
    header ("Location: login");
}else if ($_SESSION['user'] == "admin"){
    header("Location: admin");
}else{
    header("Location: home");
}

