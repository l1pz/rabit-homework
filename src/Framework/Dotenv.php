<?php
declare(strict_types=1);

namespace Framework;

class Dotenv
{
    /**
     * Load variable from .env file at $path to $_ENV superglobal
     * @param string $path Path to .env file
     * @return void
     */
    public static function load(string $path): void
    {
        $lines = file($path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            list($key, $value) = explode('=', $line);
            $_ENV[$key] = $value;
        }
    }
}