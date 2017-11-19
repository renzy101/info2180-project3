<?php
session_start();
//redirects user to login view if session is not set

if(!isset($_SESSION['user'])){
    echo 0;
    die();
}else if ($_SESSION['user'] == "admin"){
    echo 1;
    die();
}else{
    echo 2;
    die();
}

