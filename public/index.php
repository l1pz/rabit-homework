<?php
declare(strict_types=1);

define("ROOT_PATH", dirname(__DIR__));

spl_autoload_register(function (string $class) {
    // autoload classes from src directory
    // directories should be names after namespaces
    // \Framework\Router -> src/Framework/Router.php

    // make all slashes forward slashes for both unix and windows compatibility
    $class = str_replace('\\', '/', $class);

    require ROOT_PATH . "/src/$class.php";
});

use Framework\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(ROOT_PATH . '/.env');

var_dump($_ENV);
