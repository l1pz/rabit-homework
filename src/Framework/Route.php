<?php

namespace Framework;

class Route
{
    public function __construct(public readonly string $path,
                                public readonly string $controller,
                                public readonly string $action)
    {
    }
}