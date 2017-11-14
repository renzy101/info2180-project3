<?php
$routes = ["index.php" => "controller/index.controller.php",
'logo.png' => 'views/partials/logo.png',
"/" => "controller/index.controller.php",
"home" => "controller/home.controller.php",
'login' => "views/login.view.php",
'logout' => "controller/logout.controller.php",
'log' => 'controller/login.controller.php',
'admin' => 'controller/admin.controller.php',
'signup' => 'controller/signup.controller.php',
'login.css' => 'views/partials/css/login.css',
'admin.css' => "views/partials/css/admin.css",
'admin.js' => "views/partials/js/admin.js",
'favicon.ico' => 'favicon.ico',
"404" => "views/error404.view.php"
];

return $routes;
