<?php

namespace PHPCord\PHPCord\Parts\Interactions;

use PHPCord\PHPCord\Parts\Commands\ApplicationCommandInteractionDataOption;
use PHPCord\PHPCord\Parts\Commands\ApplicationCommandType;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class InteractionData
{
    public string $id;
    public string $name;
    public ApplicationCommandType $type;
    public ?Resolved $resolved;

    #[ObjectArrayType('options', ApplicationCommandInteractionDataOption::class, nullable: true)]
    public ?array $options;

    public ?string $guildId;
    public ?string $targetId;
}
