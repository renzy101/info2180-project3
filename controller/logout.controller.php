<?php
session_start();
if(!isset($_SESSION['user'])){
    header ("Location: login");
}else{
    session_unset();
    session_destroy();
    header ("Location:login");
}
