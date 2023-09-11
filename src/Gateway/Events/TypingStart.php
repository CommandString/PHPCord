<?php

namespace PHPCord\PHPCord\Gateway\Events;

use PHPCord\PHPCord\Parts\Guilds\Member;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class TypingStart
{
    public string $channelId;
    public ?string $guildId;
    public string $userId;
    public int $timestamp;
    public ?Member $member;
}
