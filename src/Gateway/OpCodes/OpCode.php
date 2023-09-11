<?php

namespace PHPCord\PHPCord\Gateway\OpCodes;

enum OpCode: int
{
    case DISPATCH = 0;
    case HEARTBEAT = 1;
    case IDENTIFY = 2;
    case PRESENCE_UPDATE = 3;
    case VOICE_STATE_UPDATE = 4;
    case RESUME = 6;
    case RECONNECT = 7;
    case REQUEST_GUILD_MEMBERS = 8;
    case INVALID_SESSION = 9;
    case HELLO = 10;
    case HEARTBEAT_ACK = 11;
}
