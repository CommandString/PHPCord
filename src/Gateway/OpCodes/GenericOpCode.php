<?php

namespace PHPCord\PHPCord\Gateway\OpCodes;

class GenericOpCode
{
    public OpCode $op;
    public mixed $d;
    public ?int $s;
    public ?string $t;
}
