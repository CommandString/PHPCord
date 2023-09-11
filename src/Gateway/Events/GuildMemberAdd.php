<?php

namespace PHPCord\PHPCord\Gateway\Events;

use PHPCord\PHPCord\Parts\Guilds\Member;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class GuildMemberAdd extends Member
{
    public string $guildId;
}