<?php

namespace CommandString\PHPCord\Parts\Guilds;

enum MemberFlags: int
{
    case DID_REJOIN = 1 << 0;
    case COMPLETED_ONBOARDING = 1 << 1;
    case BYPASSES_VERIFICATION = 1 << 2;
    case STARTED_ONBOARDING = 1 << 3;
}
