<?php

namespace CommandString\PHPCord\Parts\Guilds;

use CommandString\PHPCord\Parts\Users\User;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Member
{
    public ?User $user;
    public ?string $nick;
    public ?string $avatar;

    /** @var string[] */
    #[PrimitiveArrayType('roles', PrimitiveType::STRING)]
    public ?array $roles;

    public string $joinedAt;
    public ?string $premiumSince;
    public ?bool $deaf;
    public ?bool $mute;
    public ?int $flags;
    public ?bool $pending;
    public ?string $permissions;
    public ?string $communicationDisabledUntil;
}
