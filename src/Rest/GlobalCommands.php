<?php

namespace PHPCord\PHPCord\Rest;

use Discord\Http\Endpoint;
use PHPCord\PHPCord\Parts\Commands\ApplicationCommand;
use PHPCord\PHPCord\Rest\Driver\Http;
use PHPCord\PHPCord\Rest\Driver\Method;
use PHPCord\PHPCord\Rest\Driver\Request;
use React\Promise\PromiseInterface;
use function PHPCord\PHPCord\Helpers\objectToSnakeCaseArray;

class GlobalCommands extends Http
{
    public function getCommands(string $applicationId, bool $withLocalizations = false): PromiseInterface
    {
        return $this->mapArrayRequest(
            new Request(
                Endpoint::bind(Endpoint::GLOBAL_APPLICATION_COMMANDS, $applicationId),
                Method::GET,
                query: $withLocalizations ? ['with_localizations' => 'true'] : []
            ),
            ApplicationCommand::class
        );
    }

    public function getCommand(string $applicationId, string $commandId): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::GLOBAL_APPLICATION_COMMAND, $applicationId, $commandId),
                Method::GET
            ),
            ApplicationCommand::class
        );
    }

    public function createCommand(string $applicationId, ApplicationCommand $command): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::GLOBAL_APPLICATION_COMMANDS, $applicationId),
                Method::POST,
                body: objectToSnakeCaseArray($command)
            ),
            ApplicationCommand::class
        );
    }

    public function updateCommand(string $applicationId, ApplicationCommand $command): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::GLOBAL_APPLICATION_COMMAND, $applicationId, $command->id),
                Method::PATCH,
                body: objectToSnakeCaseArray($command)
            ),
            ApplicationCommand::class
        );
    }

    public function deleteCommand(string $applicationId, string $commandId): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                Endpoint::bind(Endpoint::GLOBAL_APPLICATION_COMMAND, $applicationId, $commandId),
                Method::DELETE
            )
        );
    }

    public function bulkOverwriteCommands(string $applicationId, ApplicationCommand ...$commands): PromiseInterface
    {
        return $this->mapArrayRequest(
            new Request(
                Endpoint::bind(Endpoint::GLOBAL_APPLICATION_COMMANDS, $applicationId),
                Method::PUT,
                body: array_map(objectToSnakeCaseArray(...), $commands)
            ),
            ApplicationCommand::class
        );
    }
}
