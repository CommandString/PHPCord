<?php

namespace PHPCord\PHPCord\Parts\Messages;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;
use PHPCord\PHPCord\Parts\Guilds\Member;
use PHPCord\PHPCord\Parts\Interactions\InteractionType;
use PHPCord\PHPCord\Parts\Users\User;

class MessageInteraction
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public InteractionType $type;
    public string $name;
    public User $user;
    public ?Member $member;
}
