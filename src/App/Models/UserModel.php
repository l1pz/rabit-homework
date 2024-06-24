<?php

declare(strict_types=1);

namespace App\Models;

readonly class UserModel
{
    public function __construct(public string $id, public string $name)
    {
    }
}
