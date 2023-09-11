<?php

namespace PHPCord\PHPCord\Parts\Commands;

class ApplicationCommandOptionChoice
{
    public string $name;
    public string|int|float $value;
    public ?array $nameLocalizations;
}