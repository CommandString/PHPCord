<?php

namespace CommandString\PHPCord\Parts\Guilds;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Role
{
    public string $id;
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
