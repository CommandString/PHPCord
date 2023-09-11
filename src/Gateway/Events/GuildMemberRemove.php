<?php

namespace PHPCord\PHPCord\Gateway\Events;

use PHPCord\PHPCord\Parts\Users\User;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class GuildMemberRemove
{
    public string $guildId;
    public User $user;
}