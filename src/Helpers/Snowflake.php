<?php

namespace PHPCord\PHPCord\Helpers;

use Stringable;

class Snowflake implements Stringable
{
    public readonly string $snowflake;

    public function __construct(string $snowflake)
    {
        $this->snowflake = $snowflake;
    }

    public function getTime(): int
    {
        return ($this->snowflake >> 22) + 1420070400000;
    }

    public function getWorkerId(): int
    {
        return ($this->snowflake & 0x3E0000) >> 17;
    }

    public function getProcessId(): int
    {
        return ($this->snowflake & 0x1F000) >> 12;
    }

    public function getIncrement(): int
    {
        return $this->snowflake & 0xFFF;
    }

    public function __toString(): string
    {
        return $this->snowflake;
    }
}
