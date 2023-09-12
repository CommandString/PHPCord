<?php

namespace PHPCord\PHPCord\Parts\Interactions;

use PHPCord\PHPCord\Parts\Channels\Channel;
use PHPCord\PHPCord\Parts\Guilds\Member;
use PHPCord\PHPCord\Parts\Messages\Message;
use PHPCord\PHPCord\Parts\Users\User;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Interaction
{
    public string $id;
    public string $applicationId;
    public InteractionType $type;
    public InteractionData $data;
    public string $guildId;
    public ?Channel $channel;
    public ?string $channelId;
    public ?Member $member;
    public ?User $user;
    public ?string $token;
    public ?int $version;
    public ?Message $message;
    public ?string $appPermissions;
    public ?string $locale;
    public ?string $guildLocale;
}
