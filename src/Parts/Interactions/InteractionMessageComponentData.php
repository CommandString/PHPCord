<?php

namespace PHPCord\PHPCord\Parts\Interactions;

use PHPCord\PHPCord\Parts\Messages\Components\MessageComponentType;

class InteractionMessageComponentData
{
    public string $customId;
    public MessageComponentType $type;
    public ?array $values;
}