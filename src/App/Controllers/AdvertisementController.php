<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Services\AdvertisementService;
use App\Services\UserService;
use Framework\Viewer;

readonly class AdvertisementController
{
    public function __construct(private AdvertisementService $advertisementService, private Viewer $viewer)
    {
    }

    public function index(): void
    {
        $advertisements = $this->advertisementService->getAll();

        echo $this->viewer->render('shared/header.php', ['title' => 'Advertisements']);
        echo $this->viewer->render('Advertisements/index.php', ['advertisements' => $advertisements]);
        echo $this->viewer->render('shared/footer.php');
    }
}