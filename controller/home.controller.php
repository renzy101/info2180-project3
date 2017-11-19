<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: /');
}else{
    echo require 'views/home.view.html';
}