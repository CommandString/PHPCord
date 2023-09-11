<?php

namespace CommandString\PHPCord\Gateway\Events;

use CommandString\PHPCord\Parts\Guilds\Member;
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