<?php

namespace App\Services;


use App\Models\AdvertisementModel;
use PDO;

class AdvertisementService
{
    public function __construct(private DatabaseService $database) {}

    /**
     * Gets all advertisements
     * @return AdvertisementModel[] An array of AdvertisementModels
     */
    public function getAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT advertisements.id, users.name AS 'username', advertisements.title FROM advertisements INNER JOIN users ON advertisements.user_id = users.id");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}