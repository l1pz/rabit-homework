<?php

declare(strict_types=1);

namespace Framework;
class Router
{
    private array $routes = [];

    public function __construct()
    {
    }

    /**
     * @param string $path URL path
     * @param string $controller Controller that this path corresponds to
     * @param string $action Action that should be called on the controller
     * @return void
     */
    public function add(string $path, string $controller, string $action): void
    {
        $path = rtrim($path, '/');
        $this->routes[] = new Route($path, $controller, $action);
    }

    public function match(string $path) : array|bool
    {
        $path = rtrim($path, '/');
        foreach ($this->routes as $route) {
            $routePath = $route['path'];
            if ($path == $routePath) {
                return $route;
            }
        }

        return false;
    }

}