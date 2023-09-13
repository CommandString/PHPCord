<?php

namespace PHPCord\PHPCord\Parts\Commands;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class ApplicationCommand
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public ?ApplicationCommandType $type;
    public ?string $applicationId;
    public ?string $guildId;
    public string $name;
    public ?array $nameLocalizations;
    public string $description;
    public ?array $descriptionLocalizations;

    #[ObjectArrayType('options', ApplicationCommandOption::class, nullable: true)]
    public ?array $options;
}
