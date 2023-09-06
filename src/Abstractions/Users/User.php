<?php

namespace CommandString\PHPCord\Abstractions\Users;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class User
{
    public string $id;
    public string $username;
    public string $discriminator;
    public ?string $globalName;
    public ?string $avatar;
    public ?bool $bot;
    public ?bool $system;
    public ?bool $mfaEnabled;
    public ?string $banner;
    public ?int $accentColor;
    public ?string $locale;
    public ?bool $verified;
    public ?string $email;
    public ?int $flags;
    public ?PremiumType $premiumType;
    public ?int $publicFlags;
    public ?string $avatarDecoration;
}
