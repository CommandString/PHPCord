<?php

namespace CommandString\PHPCord\Gateway\Events;

use CommandString\PHPCord\Parts\Application;
use CommandString\PHPCord\Parts\Guilds\UnavailableGuild;
use CommandString\PHPCord\Parts\Users\User;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Ready
{
    public int $v;
    public User $user;

    #[ObjectArrayType('guilds', UnavailableGuild::class)]
    public array $guilds;
    public string $sessionId;
    public string $resumeGatewayUrl;
    public ?array $shard;
    public Application $application;
}