<?php

namespace PHPCord\PHPCord\Parts\Messages\Embeds;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;

class Embed
{
    public ?string $title;
    public ?EmbedType $type;
    public ?string $description;
    public ?string $url;
    public ?string $timestamp;
    public ?int $color;
    public ?EmbedFooter $footer;
    public ?EmbedImage $image;
    public ?EmbedThumbnail $embedThumbnail;
    public ?EmbedVideo $video;
    public ?EmbedProvider $provider;
    public ?EmbedAuthor $author;

    #[ObjectArrayType('fields', EmbedThumbnail::class, nullable: true)]
    public ?array $fields;
}
