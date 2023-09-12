<?php

namespace PHPCord\PHPCord\Parts\Messages\Components;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class SelectMenu extends MessageComponent
{
    public MessageComponentType $type = MessageComponentType::STRING_SELECT;
    public string $placeholder;

    #[ObjectArrayType('options', SelectMenuOption::class)]
    public array $options;
    public ?int $minValues;
    public ?int $maxValues;
    public ?bool $disabled;
}