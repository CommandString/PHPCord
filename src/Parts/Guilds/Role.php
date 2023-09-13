<?php

namespace PHPCord\PHPCord\Parts\Guilds;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Role
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public string $name;
    public int $color;
    public bool $hoist;
    public ?string $icon;
    public ?string $unicodeEmoji;
    public int $position;
    public string $permissions;
    public bool $managed;
    public bool $mentionable;
    public ?RoleTags $tags;
}
