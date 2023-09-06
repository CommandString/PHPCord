<?php

namespace CommandString\PHPCord\Abstractions\Channels;

use CommandString\PHPCord\Abstractions\Permissions\Overwrite;
use CommandString\PHPCord\Abstractions\Users\User;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Channel
{
    public string $id;
    public Type $type;
    public ?string $guildId;
    public ?int $position;

    /** @var Overwrite[] */
    #[ObjectArrayType('permissionOverwrites', Overwrite::class)]
    public array $permissionOverwrites;

    public ?string $name;
    public ?string $topic;
    public ?bool $nfsw;
    public ?string $lastMessageId;
    public ?int $bitrate;
    public ?int $userLimit;
    public ?int $rateLimitPerUser;

    /** @var User[]|null */
    #[ObjectArrayType('recipients', User::class, nullable: true)]
    public ?array $recipients;

    public ?string $icon;
    public ?string $ownerId;
    public ?string $applicationId;
    public ?bool $managed;
    public ?string $parentId;
    public ?string $lastPinTimestamp;
    public ?string $rtcRegion;
    public ?VideoQualityMode $videoQualityMode;
    public ?int $messageCount;
    public ?int $memberCount;
    public ?ThreadMetadata $threadMetadata;
    public ?ThreadMember $threadMember;
    public ?int $defaultAutoArchiveDuration;
    public ?string $permissions;
    public int $flags;
    public ?int $totalMessageSent;

    /** @var ForumTag[]|null */
    #[ObjectArrayType('availableTags', ForumTag::class, nullable: true)]
    public ?array $availableTags;

    #[PrimitiveArrayType('appliedTags', PrimitiveType::STRING, nullable: true)]
    public ?array $appliedTags;

    public ?DefaultReaction $defaultReactionEmoji;
    public ?int $defaultThreadRateLimitPerUser;
    public ?int $defaultSortOrder;
    public ?int $defaultForumLayout;
}
