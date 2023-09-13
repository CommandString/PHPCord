<?php

namespace PHPCord\PHPCord\Parts\Messages;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;
use PHPCord\PHPCord\Parts\Channels\Channel;
use PHPCord\PHPCord\Parts\Messages\Components\MessageComponent;
use PHPCord\PHPCord\Parts\Users\User;
use Tnapf\JsonMapper\Attributes\IntType;
use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\ObjectType;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\JsonMapper\Attributes\StringType;

#[SnakeToCamelCase]
class Message
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public string $channelId;
    public ?User $author;
    public ?string $content;
    public string $timestamp;
    public ?string $editedTimestamp;
    public bool $tts;
    public bool $mentionEveryone;

    /** @var User[] $mentions */
    #[ObjectArrayType('mentions', User::class)]
    public array $mentions;

    /** @var string[] $mentionRoles */
    #[PrimitiveArrayType('mentionRoles', PrimitiveType::STRING)]
    public array $mentionRoles;

    /** @var ChannelMention[] $channelMentions */
    #[ObjectArrayType('mentionChannels', ChannelMention::class, nullable: true)]
    public ?array $channelMentions;

    /** @var Attachment[] $attachments */
    #[ObjectArrayType('attachments', Attachment::class)]
    public array $attachments;

    // TODO: Create Embed part
    public array $embeds;

    // TODO: Create Reaction part
    public ?array $reactions;

    #[IntType('nonce', true)]
    #[StringType('nonce', true)]
    public int|string|null $nonce;

    public bool $pinned;
    public ?string $webhookId;
    public MessageType $type;

    // TODO: Create Message Activity part
    public ?array $activity;

    // TODO: Create Application part
    public ?array $application;
    public ?string $applicationId;
    public ?MessageReference $messageReference;
    public ?int $flags;

    #[ObjectType('referencedMessage', self::class, nullable: true)]
    public ?self $referencedMessage;

    public ?MessageInteraction $interaction;
    public ?Channel $thread;

    #[ObjectArrayType('components', MessageComponent::class, nullable: true)]
    public array $components;

    // TODO: Create StickerItem part
    public ?array $stickerItems;
    public ?int $position;

    // TODO: Create Role Subscription Data part
    public ?array $roleSubscriptionData;
}
