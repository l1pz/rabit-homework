<?php
declare(strict_types=1);

define("ROOT_PATH", dirname(__DIR__));

spl_autoload_register(function (string $class) {
    $class = str_replace('\\', '/', $class);
    require ROOT_PATH . "/src/$class.php";
});
