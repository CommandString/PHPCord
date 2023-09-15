<?php

namespace PHPCord\PHPCord\Parts\Messages\Embeds;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class EmbedAuthor
{
    public ?string $name;
    public ?string $url;
    public ?string $iconUrl;
    public ?string $proxyIconUrl;
}
