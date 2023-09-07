<?php

namespace CommandString\PHPCord\Parts\Messages;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Attachment
{
    public string $id;
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
