<?php

namespace PHPCord\PHPCord\Gateway\OpCodes\Identity;

use PHPCord\PHPCord\Gateway\OpCodes\GenericOpCode;
use Tnapf\JsonMapper\Attributes\ObjectType;

class IdentityOpCode extends GenericOpCode
{
    #[ObjectType('d', IdentityData::class)]
    public mixed $d;
}
