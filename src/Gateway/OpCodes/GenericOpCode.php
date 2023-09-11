<?php

namespace CommandString\PHPCord\Gateway\OpCodes;

use CommandString\PHPCord\Gateway\Event;

class GenericOpCode
{
    public OpCode $op;
    public mixed $d;
    public ?int $s;
    public ?string $t;
}