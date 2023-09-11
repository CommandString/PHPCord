<?php

namespace CommandString\PHPCord\Rest;

use CommandString\PHPCord\Parts\Guilds\Emoji;
use CommandString\PHPCord\Rest\Driver\Http;
use CommandString\PHPCord\Rest\Driver\Method;
use CommandString\PHPCord\Rest\Driver\Request;
use Discord\Http\Endpoint;
use React\Promise\PromiseInterface;

class Emojis extends Http
{
    public function get(string $guildId, string $emojiId): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::GUILD_EMOJI, $guildId, $emojiId),
            ),
            Emoji::class
        );
    }

    public function create(string $guildId, string $name, string $image, array $roles = []): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::GUILD_EMOJIS, $guildId),
                method: Method::POST,
                body: compact('name', 'image', 'roles')
            ),
            Emoji::class
        );
    }

    public function modify(string $guildId, string $emojiId, string $name, array $roles = []): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::GUILD_EMOJI, $guildId, $emojiId),
                method: Method::PATCH,
                body: compact('name', 'roles')
            ),
            Emoji::class
        );
    }

    public function list(string $guildId): PromiseInterface
    {
        return $this->mapArrayRequest(
            new Request(
                url: Endpoint::bind(Endpoint::GUILD_EMOJIS, $guildId),
            ),
            Emoji::class
        );
    }

    public function delete(string $guildId, string $emojiId): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                url: Endpoint::bind(Endpoint::GUILD_EMOJI, $guildId, $emojiId),
                method: Method::DELETE
            )
        );
    }
}
