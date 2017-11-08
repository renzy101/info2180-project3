<?php
session_start();
if(!isset($_SESSION['user'])){
    header ("Location: login");
}

require 'views/admin_body.html';