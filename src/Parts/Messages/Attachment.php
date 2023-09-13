<?php

namespace PHPCord\PHPCord\Parts\Messages;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Attachment
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public string $filename;
    public ?string $description;
    public string $contentType;
    public int $size;
    public string $url;
    public string $proxyUrl;
    public ?int $height;
    public ?int $width;
    public ?bool $ephemeral;
    public ?float $durationSecs;
    public ?string $waveform;
    public ?int $flags;
}
