<?php

namespace PHPCord\PHPCord\Parts\Messages\Components;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class MessageComponent
{
    public MessageComponentType $type;
    public ?string $customId;
}