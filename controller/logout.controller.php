<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: /');
}else{
    session_unset();
    session_destroy();
    echo 0;
    header('Location: /'); // redirects to the home page when user logs out
}