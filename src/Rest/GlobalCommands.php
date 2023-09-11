<?php

namespace PHPCord\PHPCord\Rest;

use Discord\Http\Endpoint;
use PHPCord\PHPCord\Parts\Commands\ApplicationCommand;
use PHPCord\PHPCord\Rest\Driver\Http;
use PHPCord\PHPCord\Rest\Driver\Method;
use PHPCord\PHPCord\Rest\Driver\Request;
use React\Promise\PromiseInterface;

class GlobalCommands extends Http
{
    public function getCommands(string $applicationId, bool $withLocalizations = false): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::GLOBAL_APPLICATION_COMMANDS, $applicationId),
                Method::GET,
                query: $withLocalizations ? ['with_localizations' => 'true'] : []
            ),
            ApplicationCommand::class
        );
    }
}