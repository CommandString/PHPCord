<?php

namespace PHPCord\PHPCord\Rest;

use Discord\Http\Endpoint;
use PHPCord\PHPCord\Parts\Commands\ApplicationCommand;
use PHPCord\PHPCord\Rest\Driver\Http;
use PHPCord\PHPCord\Rest\Driver\Method;
use PHPCord\PHPCord\Rest\Driver\Request;
use React\Promise\PromiseInterface;

class GuildCommands extends Http
{
    public function getCommands(string $applicationId, string $guildId, bool $withLocalizations = false): PromiseInterface
    {
        return $this->mapArrayRequest(
            new Request(
                Endpoint::bind(Endpoint::GUILD_APPLICATION_COMMANDS, $applicationId, $guildId),
                Method::GET,
                query: $withLocalizations ? ['with_localizations' => 'true'] : []
            ),
            ApplicationCommand::class
        );
    }

    public function getCommand(string $applicationId, string $guildId, string $commandId): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::GUILD_APPLICATION_COMMAND, $applicationId, $guildId, $commandId),
                Method::GET
            ),
            ApplicationCommand::class
        );
    }

    public function createCommand(string $applicationId, string $guildId, ApplicationCommand $command): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::GUILD_APPLICATION_COMMANDS, $applicationId, $guildId),
                Method::POST,
                body: objectToSnakeCaseArray($command)
            ),
            ApplicationCommand::class
        );
    }

    public function updateCommand(string $applicationId, string $guildId, string $commandId, ApplicationCommand $command): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::GUILD_APPLICATION_COMMAND, $applicationId, $guildId, $commandId),
                Method::PATCH,
                body: objectToSnakeCaseArray($command)
            ),
            ApplicationCommand::class
        );
    }

    public function deleteCommand(string $applicationId, string $guildId, string $commandId): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                Endpoint::bind(Endpoint::GUILD_APPLICATION_COMMAND, $applicationId, $guildId, $commandId),
                Method::DELETE
            )
        );
    }

    public function bulkOverwriteCommands(string $applicationId, string $guildId, ApplicationCommand ...$commands): PromiseInterface
    {
        return $this->mapArrayRequest(
            new Request(
                Endpoint::bind(Endpoint::GUILD_APPLICATION_COMMANDS, $applicationId, $guildId),
                Method::PUT,
                body: array_map(objectToSnakeCaseArray(...), $commands)
            ),
            ApplicationCommand::class
        );
    }
}
