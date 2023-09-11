<?php

namespace PHPCord\PHPCord\Parts\Messages;

use PHPCord\PHPCord\Parts\Channels\ChannelType;

class ChannelMention
{
    public string $id;
    public string $guildId;
    public ChannelType $type;
    public string $name;
}
