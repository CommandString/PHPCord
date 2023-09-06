<?php

namespace CommandString\PHPCord\Rest;

use CommandString\PHPCord\Abstractions\Application as ApplicationAbstraction;
use CommandString\PHPCord\Rest\Driver\Http;
use CommandString\PHPCord\Rest\Driver\Request;
use React\Promise\PromiseInterface;

class Application extends Http
{
    public function getCurrent(): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: '/applications/@me'
            ),
            ApplicationAbstraction::class
        );
    }
}
