<?php
session_start();
if(!isset($_SESSION['user'])){
    header ("Location: login");
}
require 'views/home.view.php';