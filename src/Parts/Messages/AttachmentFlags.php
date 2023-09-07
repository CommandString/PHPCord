<?php

namespace CommandString\PHPCord\Parts\Messages;

enum AttachmentFlags: int
{
    case IS_REMIX = 1 << 2;
}
