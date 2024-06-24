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

    /**
     * @param string $path Path that should be matched
     * @return Route|bool Returns Route if matches, false otherwise
     */
    public function match(string $path) : Route|bool
    {
        // trim trailing slash from the path
        $path = rtrim($path, '/');
        foreach ($this->routes as $route) {
            if ($path == $route->path) {
                return $route;
            }
        }

        return false;
    }

}