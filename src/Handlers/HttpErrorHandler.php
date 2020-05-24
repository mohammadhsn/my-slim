<?php


namespace App\Handlers;

use Slim\Handlers\ErrorHandler;

class HttpErrorHandler extends ErrorHandler
{
    protected function logError(string $error): void
    {
        if ($this->statusCode === 500) {
            $this->logger->error($error);
        }
    }
}
