<?php

namespace PHPCord\PHPCord\Gateway\Events;

use PHPCord\PHPCord\Parts\Guilds\Member;
use PHPCord\PHPCord\Parts\Messages\Message;
use PHPCord\PHPCord\Parts\Users\User;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class MessageCreate extends Message
{
    public ?string $guildId;
    public ?Member $member;

    /** @var User[] $mentions */
    #[ObjectArrayType('mentions', User::class)]
    public array $mentions;
}