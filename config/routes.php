<?php
$routes = [
//images
'favicon.ico' => 'favicon.ico',

//views
"index.php" => "views/main.view.html",
"/" => "views/main.view.html",
'login' => "views/login.view.html",
"404" => "views/error404.view.html",

//controllers
'SC' => 'controller/session_check.controller.php',
'logout' => "controller/logout.controller.php",
'log' => 'controller/login.controller.php',
'signup' => 'controller/signup.controller.php',
'send' => "controller/send_msg.controller.php",
'recents' => 'controller/recent_msg.controller.php',
'admin' => 'controller/admin.controller.php',
"home" => "controller/home.controller.php",
'read' => 'controller/read.controller.php',

//JS
'login.js' => 'views/partials/js/login.js',
'admin.js' => "views/partials/js/admin.js",
'main.js' => 'views/partials/js/main.js',

//CSS
'admin.css' => "views/partials/css/admin.css",
'login.css' => 'views/partials/css/login.css'
];

return $routes;
