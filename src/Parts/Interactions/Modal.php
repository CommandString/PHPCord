<?php

namespace PHPCord\PHPCord\Parts\Interactions;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Modal
{
    public string $customId;
    public string $title;
    public array $components;
}
