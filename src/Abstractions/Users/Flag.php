<?php

namespace CommandString\PHPCord\Abstractions\Users;

enum Flag: int
{
    case STAFF = 1 << 0;
    case PARTNER = 1 << 1;
    case HYPESQUAD = 1 << 2;
    case BUG_HUNTER_LEVEL_1 = 1 << 3;
    case HOUSE_BRAVERY = 1 << 6;
    case HOUSE_BRILLIANCE = 1 << 7;
    case HOUSE_BALANCE = 1 << 8;
    case EARLY_SUPPORTER = 1 << 9;
    case TEAM_USER = 1 << 10;
    case BUG_HUNTER_LEVEL_2 = 1 << 14;
    case VERIFIED_BOT = 1 << 16;
    case EARLY_VERIFIED_BOT_DEVELOPER = 1 << 17;
    case CERTIFIED_MODERATOR = 1 << 18;
    case BOT_HTTP_INTERACTIONS = 1 << 19;
    case ACTIVE_DEVELOPER = 1 << 22;
}
