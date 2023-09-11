<?php

namespace PHPCord\PHPCord\Parts\Guilds;

use PHPCord\PHPCord\Parts\Users\User;
use Stringable;

class Emoji implements Stringable
{
    public string $id;
    public string $name;
    public ?array $roles;
    public ?User $user;
    public ?bool $requireColons;
    public ?bool $managed;
    public ?bool $animated;
    public ?bool $available;

    public function __toString(): string
    {
        if (!isset($this->id)) {
            return $this->name ?? '';
        }

        return '<' . ($this->animated ?? false ? 'a' : '') . ":{$this->name}:{$this->id}>";
    }
}
