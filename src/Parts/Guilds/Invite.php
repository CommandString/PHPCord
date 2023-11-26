<?php

namespace PHPCord\PHPCord\Parts\Guilds;

use PHPCord\PHPCord\Parts\Application;
use PHPCord\PHPCord\Parts\Channels\Channel;
use PHPCord\PHPCord\Parts\Users\User;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Invite
{
    public string $code;
    public ?Guild $guild;
    public ?Channel $channel;
    public ?User $inviter;
    public ?InviteTargetType $targetType;
    public ?User $targetUser;
    public ?Application $targetApplication;
    public ?int $approximatePresenceCount;
    public ?int $approximateMemberCount;
    public ?string $expiresAt;

    // InviteMetaData
    public ?int $uses;
    public ?int $maxUses;
    public ?int $maxAge;
    public ?bool $temporary;
    public ?bool $unique;
    public ?string $createdAt;
}