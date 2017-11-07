<?php
session_start();
//redirects user to login view if session is not set

if(!isset($_SESSION['user'])){
    header ("Location: login");
}else{
    header("Location: home");
}

