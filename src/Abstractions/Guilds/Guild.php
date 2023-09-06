<?php

namespace CommandString\PHPCord\Abstractions\Guilds;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Guild
{
    public string $id;
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
    public int $afkTimeout;
    public ?bool $widgetEnabled;
    public ?string $widgetChannelId;
    public int $verificationLevel;
    public int $defaultMessageNotifications;
    public int $explicitContentFilter;

    // TODO: Create Role abstraction
    public array $roles;

    // TODO: Create Emoji abstraction
    public array $emojis;

    // TODO: Create Feature abstraction
    public array $features;

    // TODO create MFA Enum
    public int $mfaLevel;
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
    public int $nsfwLevel;

    // TODO: Create Sticker abstraction
    public ?array $stickers;
    public bool $premiumProgressBarEnabled;
    public ?string $safetyAlertsChannelId;
}
