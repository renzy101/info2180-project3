<?php
$routes = ["index.php" => "controller/index.controller.php",
"about" => "controller/about.controller.php",
"contact-us" => "controller/contact_us.controller.php",
"home" => "controller/home.controller.php",
'login' => "views/login.view.php",
'log' => 'controller/login.controller.php',
"404" => "views/error404.view.php"
];

return $routes;
