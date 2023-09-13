<?php

namespace PHPCord\PHPCord\Parts\Messages\Components;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class TextInput extends MessageComponent
{
    public MessageComponentType $type = MessageComponentType::TEXT_INPUT;
    public TextInputStyle $style;
    public string $label;
    public ?int $minLength;
    public ?int $maxLength;
    public ?bool $required;
    public ?string $value;
    public ?string $placeholder;
}
