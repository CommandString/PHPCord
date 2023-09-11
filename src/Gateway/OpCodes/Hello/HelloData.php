<?php

namespace PHPCord\PHPCord\Gateway\OpCodes\Hello;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class HelloData
{
    public int $heartbeatInterval;
}
