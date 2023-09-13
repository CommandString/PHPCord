<?php

namespace PHPCord\PHPCord\Parts;

use PHPCord\PHPCord\Helpers\Snowflake;
use PHPCord\PHPCord\MapperTypes\ConstructorType;
use PHPCord\PHPCord\Parts\Guilds\Guild;
use PHPCord\PHPCord\Parts\Users\User;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Application
{
    #[ConstructorType('id', class: Snowflake::class)]
    public Snowflake $id;

    public ?string $name;
    public ?string $icon;
    public ?string $description;

    /** @var string[] */
    #[PrimitiveArrayType('rpcOrigins', PrimitiveType::STRING, true)]
    public ?array $rpcOrigins;

    public ?bool $botPublic;
    public ?bool $botRequireCodeGrant;
    public ?string $termsOfServiceUrl;
    public ?string $privacyPolicyUrl;
    public ?User $owner;
    public ?string $verifyKey;

    // TODO: Create Team part
    public ?array $team;
    public ?string $guildId;
    public ?Guild $guild;
    public ?string $primarySkuId;
    public ?string $slug;
    public ?string $coverImage;
    public int $flags;
    public ?int $approximateGuildCount;

    #[PrimitiveArrayType('tags', PrimitiveType::STRING, true)]
    public ?array $tags;

    // TODO: Create InstallParam part
    public ?array $installParams;
    public ?string $customInstallUrl;
    public ?string $roleConnectionsVerificationUrl;
}
