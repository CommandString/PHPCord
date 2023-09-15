<?php

namespace PHPCord\PHPCord\Parts\Messages\Embeds;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class EmbedField
{
    public string $name;
    public string $value;
    public ?bool $inline;
}
