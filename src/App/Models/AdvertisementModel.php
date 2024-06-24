<?php
declare(strict_types=1);

namespace App\Models;

readonly class AdvertisementModel
{
    public function __construct(public string $id, public string $username, public string $title)
    {
    }
}