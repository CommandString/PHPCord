<?php

namespace CommandString\PHPCord\Abstractions\Channels;

class ForumTag
{
    public string $id;
    public string $name;
    public bool $moderated;
    public ?string $emojiId;
    public ?string $emojiName;
}
