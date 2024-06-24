<?php

declare(strict_types=1);

namespace Framework;

use Framework\Exceptions\PageNotFoundException;
use ReflectionException;

readonly class RouteDispatcher
{

    public function __construct(private Router $router, private ServiceContainer $services)
    {
    }

    /**
     * If the path matched a route it calls the corresponding
     * controller-action pair defined in the matched route
     * @param string $path
     * @return void
     * @throws ReflectionException
     * @throws PageNotFoundException
     */
    public function handle(string $path): void
    {
        $route = $this->router->match($path);

        if ($route === false) {
            throw new PageNotFoundException("No route matched for $path");
        }

        // construct the controller name
        $controllerName = 'App\Controllers\\' . ucwords($route->controller);
        $action = $route->action;

        // construct the controller itself from its name
        // using dependency injection
        $controller = $this->services->get($controllerName);
        $controller->$action();
    }
}