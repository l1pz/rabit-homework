<?php

use Framework\Router;

$router = new Router;
$router->add('/', 'home', 'index');
$router->add('/users', 'users', 'index');
$router->add('/advertisements', 'advertisements', 'index');

return $router;