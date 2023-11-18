<?php

namespace PHPCord\PHPCord\Parts\Guilds;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class RoleTags
{
    public ?string $botId;
    public ?string $integrationId;
    public ?bool $premiumSubscriber;
    public ?string $subscriptionListingId;
    public ?bool $availableForPurchase;
    public ?bool $guildConnections;
}
