<?php

namespace PHPCord\PHPCord\Parts\Commands;

enum ApplicationCommandType: int
{
    case CHAT_INPUT = 1;
    case USER = 2;
    case MESSAGE = 3;
}