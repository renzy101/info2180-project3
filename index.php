<?php
if(explode(".",$_GET['url'])[1] == "css"){
    header("Content-Type: text/css");
}
require 'router.php';
$router = new Router();
require $router->direct($_GET['url']);