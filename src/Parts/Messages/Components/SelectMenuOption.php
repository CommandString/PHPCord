<?php

namespace PHPCord\PHPCord\Parts\Messages\Components;

use PHPCord\PHPCord\Parts\Guilds\Emoji;

class SelectMenuOption
{
    public string $label;
    public string $value;
    public string $description;
    public ?Emoji $emoji;
    public ?bool $default;
}
