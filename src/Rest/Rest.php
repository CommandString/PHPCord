<?php

namespace PHPCord\PHPCord\Rest;

use Discord\Http\Http;
use Psr\Log\LoggerInterface;
use ReflectionClass;

class Rest
{
    public readonly Application $application;
    public readonly Users $users;
    public readonly Channels $channels;
    public readonly Messages $messages;
    public readonly Guilds $guilds;
    public readonly Emojis $emojis;
    public readonly GlobalCommands $globalCommands;
    public readonly GuildCommands $guildCommands;
    public readonly Interactions $interactions;

    public function __construct(
        Http $http,
        LoggerInterface $logger
    ) {
        $reflection = new ReflectionClass($this);

        foreach ($reflection->getProperties() as $property) {
            $type = $property->getType()->getName();
            $name = $property->getName();

            $this->$name = new $type($http, $logger);
        }
    }
}
