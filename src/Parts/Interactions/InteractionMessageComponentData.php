<?php

namespace PHPCord\PHPCord\Parts\Interactions;

use PHPCord\PHPCord\Parts\Messages\Components\MessageComponentType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class InteractionMessageComponentData
{
    public string $customId;
    public MessageComponentType $componentType;
    public ?array $values;
}
