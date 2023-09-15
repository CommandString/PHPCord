<?php

namespace PHPCord\PHPCord\Parts\Messages\Embeds;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class EmbedVideo
{
    public ?string $url;
    public ?string $proxyUrl;
    public ?int $height;
    public ?int $width;
}
