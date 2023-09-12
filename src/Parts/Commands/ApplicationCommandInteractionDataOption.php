<?php

namespace PHPCord\PHPCord\Parts\Commands;

use Tnapf\JsonMapper\Attributes\BoolType;
use Tnapf\JsonMapper\Attributes\FloatType;
use Tnapf\JsonMapper\Attributes\IntType;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\StringType;

class ApplicationCommandInteractionDataOption
{
    public string $name;
    public ApplicationCommandOptionType $type;

    #[StringType('value', true)]
    #[IntType('value', true)]
    #[FloatType('value', true)]
    #[BoolType('value', true)]
    public string|int|float|bool|null $value;

    #[ObjectArrayType('options', self::class, nullable: true)]
    public ?array $options;

    public ?bool $focused;
}
