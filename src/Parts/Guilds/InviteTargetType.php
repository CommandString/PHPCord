<?php

namespace PHPCord\PHPCord\Parts\Guilds;

enum InviteTargetType: int
{
    case STREAM = 1;
    case EMBEDDED_APPLICATION = 2;
}