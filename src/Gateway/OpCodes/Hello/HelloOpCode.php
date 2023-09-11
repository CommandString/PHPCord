<?php

namespace CommandString\PHPCord\Gateway\OpCodes\Hello;

use CommandString\PHPCord\Gateway\OpCodes\GenericOpCode;
use Tnapf\JsonMapper\Attributes\ObjectType;

/**
 * @property HelloData $d
 */
class HelloOpCode extends GenericOpCode
{
    #[ObjectType('d', HelloData::class)]
    public mixed $d;
}
