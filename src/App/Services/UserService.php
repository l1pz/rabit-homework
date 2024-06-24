<?php
declare(strict_types = 1);

namespace App\Services;

use App\Models\UserModel;
use PDO;

readonly class UserService
{
    public function __construct(private DatabaseService $database) {}

    /**
     * Gets all users
     * @return UserModel[] An array of UserModels
     */
    public function getAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}