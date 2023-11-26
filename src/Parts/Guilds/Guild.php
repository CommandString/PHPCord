<?php

namespace PHPCord\PHPCord\Parts\Guilds;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Guild
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public string $name;
    public ?string $icon;
    public ?string $icon_hash;
    public ?string $splash;
    public ?string $discoverySplash;
    public ?bool $owner;
    public ?string $ownerId;
    public ?string $permissions;
    public ?string $region;
    public ?string $afkChannelId;
    public ?int $afkTimeout;
    public ?bool $widgetEnabled;
    public ?string $widgetChannelId;
    public ?int $verificationLevel;
    public ?int $defaultMessageNotifications;
    public ?int $explicitContentFilter;

    /** @var Role[] $roles */
    #[ObjectArrayType('roles', Role::class, nullable: true)]
    public ?array $roles;

    /** @var Emoji[] $emojis */
    #[ObjectArrayType('emojis', Emoji::class, nullable: true)]
    public ?array $emojis;

    // TODO: Create Feature abstraction
    public ?array $features;

    // TODO create MFA Enum
    public ?int $mfaLevel;
    public ?string $applicationId;
    public ?int $systemChannelFlags;
    public ?string $rulesChannelId;
    public ?int $maxPresences;
    public ?int $maxMembers;
    public ?string $vanityUrlCode;
    public ?string $description;
    public ?string $banner;

    // TODO: Create PremiumTier Enum
    public ?int $premiumTier;
    public ?int $premiumSubscriptionCount;
    public ?string $preferredLocale;
    public ?string $publicUpdatesChannelId;
    public ?int $maxVideoChannelUsers;
    public ?int $maxStageVideoChannelUsers;
    public ?int $approximateMemberCount;
    public ?int $approximatePresenceCount;

    // TODO: Create welcome screen abstraction
    public ?array $welcomeScreen;
    public ?int $nsfwLevel;

    // TODO: Create Sticker abstraction
    public ?array $stickers;
    public ?bool $premiumProgressBarEnabled;
    public ?string $safetyAlertsChannelId;
}
