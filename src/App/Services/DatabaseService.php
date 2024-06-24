<?php

declare(strict_types=1);

namespace App\Services;

use PDO;

readonly class DatabaseService
{
    public function __construct(
        public string $host,
        public string $name,
        public string $user,
        public string $password
    )
    {
    }

    public function getConnection(): PDO
    {
        $dsn = "mysql:host=$this->host;dbname=$this->name;charset=utf8;port=3306";
        return new PDO($dsn, $this->user, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

    }
}