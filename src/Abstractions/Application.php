<?php

namespace CommandString\PHPCord\Abstractions;

use CommandString\PHPCord\Abstractions\Users\User;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Application
{
    public string $id;
    public string $name;
    public ?string $icon;
    public string $description;

    #[PrimitiveArrayType('rpcOrigins', PrimitiveType::STRING, true)]
    public ?array $rpcOrigins;

    public bool $botPublic;
    public bool $botRequireCodeGrant;
    public ?string $termsOfServiceUrl;
    public ?string $privacyPolicyUrl;
    public ?User $owner;
}
