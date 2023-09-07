<?php

namespace CommandString\PHPCord\Parts\Messages;

use CommandString\PHPCord\Parts\Channels\ChannelType;

class ChannelMention
{
    public string $id;
    public string $guildId;
    public ChannelType $type;
    public string $name;
}
