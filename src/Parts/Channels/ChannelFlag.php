<?php

namespace CommandString\PHPCord\Parts\Channels;

enum ChannelFlag: int
{
    case PINNED = 1 << 0;
    case REQUIRE_TAGS = 1 << 4;
    case HIDE_MEDIA_DOWNLOAD_OPTIONS = 1 << 15;
}
