<?php

declare(strict_types=1);

namespace Framework;

use ErrorException;
use Framework\Exceptions\PageNotFoundException;
use Throwable;

class ErrorHandler
{
    /**
     * Handle error by returning an error page based on the exception type
     * If $_ENV['SHOW_ERRORS'] is true, then it logs the error instead
     * @param Throwable $exception The exception throwns
     * @return void
     * @throws Throwable
     */
    public static function handleException(Throwable $exception) : void
    {
        if ($exception instanceof PageNotFoundException) {
            http_response_code(404);
            $template = '404.php';
        } else {
            http_response_code(500);
            $template = '500.php';
        }

        if ($_ENV['SHOW_ERRORS']) {
            ini_set('display_errors', '1');
        } else {
            ini_set('display_errors', '0');
            ini_set('log_errors', '1');
            require ROOT_PATH . "/views/$template";
        }
        throw $exception;
    }

    /**
     * Convert PHP errors to exceptions to be handled by the exceptionHandler
     * @param int $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     * @return void
     * @throws ErrorException
     */
    public static function handleError(int $errno, string $errstr, string $errfile, int $errline):void
    {
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }
}