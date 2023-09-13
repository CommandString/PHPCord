<?php

namespace PHPCord\PHPCord\Parts\Messages;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;
use PHPCord\PHPCord\Parts\Channels\ChannelType;

class ChannelMention
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public string $guildId;
    public ChannelType $type;
    public string $name;
}
