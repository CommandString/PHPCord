<?php

namespace PHPCord\PHPCord\Gateway\OpCodes\Identity;

class UpdatePresence
{
    public ?int $since;
    public array $activities;
    public Status $status;
    public ?bool $afk;
}
