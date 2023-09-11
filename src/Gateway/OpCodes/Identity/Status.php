<?php

namespace PHPCord\PHPCord\Gateway\OpCodes\Identity;

enum Status: string
{
    case ONLINE = 'online';
    case DND = 'dnd';
    case IDLE = 'idle';
    case INVISIBLE = 'invisible';
    case OFFLINE = 'offline';
}
