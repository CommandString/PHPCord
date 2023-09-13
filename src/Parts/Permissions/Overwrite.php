<?php

namespace PHPCord\PHPCord\Parts\Permissions;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;

class Overwrite
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public int $type;
    public string $allow;
    public string $deny;
}
