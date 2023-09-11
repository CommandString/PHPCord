<?php

namespace PHPCord\PHPCord\Parts\Commands;

use PHPCord\PHPCord\Parts\Channels\ChannelType;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class ApplicationCommandOption
{
    public ApplicationCommandType $type;
    public string $name;
    public array $nameLocalizations;
    public string $description;
    public array $descriptionLocalizations;
    public bool $required;

    #[ObjectArrayType('options', ApplicationCommandOption::class, nullable: true)]
    public ?array $choices;

    #[ObjectArrayType('channelTypes', ChannelType::class, nullable: true)]
    public ?array $channelTypes;
    public int $minValue;
    public int $maxValue;
    public int $minLength;
    public int $maxLength;
    public bool $autocomplete;
}