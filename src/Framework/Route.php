<?php

declare(strict_types=1);

namespace Framework;

readonly class Route
{
    public function __construct(public string $path,
                                public string $controller,
                                public string $action)
    {
    }
}