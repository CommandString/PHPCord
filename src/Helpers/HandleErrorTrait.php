<?php

namespace PHPCord\PHPCord\Helpers;

use Psr\Log\LoggerInterface;
use Throwable;

trait HandleErrorTrait
{
    public readonly LoggerInterface $logger;

    private function handleError(Throwable $error): void
    {
        $this->logger->error($error->getMessage(), [
            'file' => $error->getFile(),
            'line' => $error->getLine(),
            'trace' => $error->getTraceAsString(),
        ]);
    }
}
