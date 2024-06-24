<?php
declare(strict_types=1);

namespace App\Controllers;

use Framework\Viewer;

readonly class HomeController
{
    public function __construct(private Viewer $viewer)
    {}
    /**
     * Renders the home
     * @return void
     */
    public function index(): void
    {
        echo $this->viewer->render('shared/header.php', ['title' => 'Users']);
        echo $this->viewer->render('Home/index.php');
        echo $this->viewer->render('shared/footer.php');
    }
}