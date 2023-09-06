<?php

namespace CommandString\PHPCord\Abstractions\Channels;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class ThreadMetadata
{
    public bool $archived;
    public int $autoArchiveDuration;
    public string $archiveTimestamp;
    public bool $locked;
    public ?bool $invitable;
    public ?string $createTimestamp;
}
