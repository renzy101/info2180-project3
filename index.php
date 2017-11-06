<?php
require 'router.php';

$router = new Router();

require $router->direct($_GET['url']);