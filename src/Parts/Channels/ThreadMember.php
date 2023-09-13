<?php

namespace PHPCord\PHPCord\Parts\Channels;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;
use PHPCord\PHPCord\Parts\Guilds\Member;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;

class ThreadMember
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public string $userId;
    public ?string $joinTimestamp;
    public int $flags;

    #[ObjectArrayType('member', Member::class)]
    public ?array $member;
}
