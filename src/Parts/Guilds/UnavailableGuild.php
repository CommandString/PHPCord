<?php

namespace PHPCord\PHPCord\Parts\Guilds;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;

class UnavailableGuild
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public bool $unavailable;
}
