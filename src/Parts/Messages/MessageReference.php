<?php

namespace CommandString\PHPCord\Parts\Messages;

class MessageReference
{
    public ?string $messageId;
    public ?string $channelId;
    public ?string $guildId;
    public ?bool $failIfNotExists;
}
