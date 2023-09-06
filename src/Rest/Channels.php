<?php

namespace CommandString\PHPCord\Rest;

use CommandString\PHPCord\Abstractions\Channels\Channel;
use CommandString\PHPCord\Rest\Driver\Http;
use CommandString\PHPCord\Rest\Driver\Request;
use React\Promise\PromiseInterface;

class Channels extends Http
{
    public function get(string $channelId): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: '/users/@me'
            ),
            Channel::class
        );
    }
}
