<?php

namespace PHPCord\PHPCord\Parts\Interactions;

use PHPCord\PHPCord\Parts\Channels\Channel;
use PHPCord\PHPCord\Parts\Guilds\Member;
use PHPCord\PHPCord\Parts\Guilds\Role;
use PHPCord\PHPCord\Parts\Messages\Attachment;
use PHPCord\PHPCord\Parts\Messages\Message;
use PHPCord\PHPCord\Parts\Users\User;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;

class Resolved
{
    #[ObjectArrayType('users', User::class)]
    public array $users;

    #[ObjectArrayType('members', Member::class)]
    public array $members;

    #[ObjectArrayType('roles', Role::class)]
    public array $roles;

    #[ObjectArrayType('channels', Channel::class)]
    public array $channels;

    #[ObjectArrayType('messages', Message::class)]
    public array $messages;

    #[ObjectArrayType('attachments', Attachment::class)]
    public array $attachments;
}
