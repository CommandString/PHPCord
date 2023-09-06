<?php

namespace CommandString\PHPCord\Abstractions\Channels;

class ThreadMember
{
    public string $id;
    public string $userId;
    public ?string $joinTimestamp;
    public int $flags;

    // TODO: Create Member abstraction
    public ?array $member;
}
