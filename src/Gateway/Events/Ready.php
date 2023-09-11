<?php

namespace PHPCord\PHPCord\Gateway\Events;

use PHPCord\PHPCord\Parts\Application;
use PHPCord\PHPCord\Parts\Guilds\UnavailableGuild;
use PHPCord\PHPCord\Parts\Users\User;
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
