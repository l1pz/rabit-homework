<?php

use Framework\Router;

$router = new Router;
$router->add('/', 'HomeController', 'index');
$router->add('/users', 'UserController', 'index');
$router->add('/advertisements', 'AdvertisementsController', 'index');

return $router;