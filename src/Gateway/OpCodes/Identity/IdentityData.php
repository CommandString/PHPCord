<?php

namespace CommandString\PHPCord\Gateway\OpCodes\Identity;

class IdentityData
{
    public string $token;
    public ConnectionProperties $properties;
    public ?bool $compress;
    public int $largeThreshold;
    public ?array $shard;
    public UpdatePresence $presence;
    public int $intents;
}