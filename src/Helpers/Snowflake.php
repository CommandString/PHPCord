<?php

namespace PHPCord\PHPCord\Helpers;

use JsonSerializable;
use Stringable;

class Snowflake implements Stringable, JsonSerializable
{
    public readonly string $snowflake;

    public function __construct(string $snowflake)
    {
        $this->snowflake = $snowflake;
    }

    public function getTime(): int
    {
        return floor((($this->snowflake >> 22) + 1420070400000) / 1000);
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

    public function jsonSerialize(): string
    {
        return $this->snowflake;
    }
}
