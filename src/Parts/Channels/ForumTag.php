<?php

namespace PHPCord\PHPCord\Parts\Channels;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;

class ForumTag
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public string $name;
    public bool $moderated;
    public ?string $emojiId;
    public ?string $emojiName;
}
