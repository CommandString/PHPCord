<?php

namespace PHPCord\PHPCord\Parts\Interactions;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class InteractionModalSubmitData
{
    public string $customId;
    public array $components;
}
