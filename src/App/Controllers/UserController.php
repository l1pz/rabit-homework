<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\UserService;

class UserController
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function index(): void
    {
        $users = $this->userService->getAll();

       var_dump($users);
    }
}