<?php

use App\Services\Database;
use Framework\ServiceContainer;

$services = new ServiceContainer();
$services->set(Database::class, function () {
    return new Database($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
});

return $services;