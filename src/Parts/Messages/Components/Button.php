<?php

namespace PHPCord\PHPCord\Parts\Messages\Components;

use PHPCord\PHPCord\Parts\Guilds\Emoji;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Button extends MessageComponent
{
    public MessageComponentType $type = MessageComponentType::BUTTON;
    public ButtonStyle $style;
    public ?string $label;
    public ?Emoji $emoji;
    public ?string $url;
    public ?bool $disabled;
}
