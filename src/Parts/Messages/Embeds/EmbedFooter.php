<?php

namespace PHPCord\PHPCord\Parts\Messages\Embeds;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class EmbedFooter
{
    public ?string $text;
    public ?string $iconUrl;
    public ?string $proxyIconUrl;
}
