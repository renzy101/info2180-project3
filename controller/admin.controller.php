<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: /');
}elseif($_SESSION['user'] == 'admin'){
    echo require 'views/admin_body.html';
}else{
    header('Location: /');
}