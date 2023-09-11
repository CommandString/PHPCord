<?php

namespace PHPCord\PHPCord\Parts\Channels;

use PHPCord\PHPCord\Parts\Guilds\Member;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;

class ThreadMember
{
    public string $id;
    public string $userId;
    public ?string $joinTimestamp;
    public int $flags;

    #[ObjectArrayType('member', Member::class)]
    public ?array $member;
}
