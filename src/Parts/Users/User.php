<?php

namespace CommandString\PHPCord\Parts\Users;

use Stringable;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class User implements Stringable
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

    public function __toString(): string
    {
        return !isset($this->id) ? '' : "<@$this->id>";
    }
}
