<?php

namespace PHPCord\PHPCord\Parts\Interactions;

use PHPCord\PHPCord\Parts\Commands\ApplicationCommandOptionChoice;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;

class Autocomplete
{
    #[ObjectArrayType('choices', ApplicationCommandOptionChoice::class)]
    public array $choices;
}
