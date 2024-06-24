<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\UserService;
use Framework\Viewer;

readonly class UserController
{
    public function __construct(private UserService $userService, private Viewer $viewer)
    {
    }

    public function index(): void
    {
        $users = $this->userService->getAll();

        echo $this->viewer->render('shared/header.php', ['title' => 'Users']);
        echo $this->viewer->render('Users/index.php', ['users' => $users]);
        echo $this->viewer->render('shared/footer.php');
    }
}