<?php

namespace PHPCord\PHPCord\Parts\Interactions;

use PHPCord\PHPCord\Parts\Messages\Components\MessageComponent;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class InteractionModalSubmitData
{
    public string $customId;
    public array $components;
}