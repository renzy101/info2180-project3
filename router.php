<?php
class Router{
    private $routes;
    
    public function __construct(){
        $this->routes = require 'config/routes.php';
    }
    
    public function direct($uri){
        if(array_key_exists($uri, $this->routes)){
            return $this->routes[$uri];
        }else{
            return $this->routes['404'];
        }
    }
}