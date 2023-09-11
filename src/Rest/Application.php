<?php

namespace PHPCord\PHPCord\Rest;

use PHPCord\PHPCord\Parts\Application as ApplicationAbstraction;
use PHPCord\PHPCord\Rest\Driver\Http;
use PHPCord\PHPCord\Rest\Driver\Request;
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
