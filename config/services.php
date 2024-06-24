<?php

use App\Services\DatabaseService;
use Framework\ServiceContainer;

$services = new ServiceContainer();
$services->set(DatabaseService::class, function () {
    return new DatabaseService($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
});

return $services;