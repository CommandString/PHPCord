<?php

namespace CommandString\PHPCord;

use CommandString\PHPCord\Rest\Rest;
use Discord\Http\DriverInterface;
use Discord\Http\Http;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use React\EventLoop\Loop;

class Discord
{
    public readonly Rest $rest;

    public function __construct(
        private string $token,
        private LoggerInterface $logger = new NullLogger()
    ) {
        $this->logger->debug('Discord client created');
    }

    public function withRest(
        DriverInterface $driver
    ): self {
        $this->logger->debug('Rest mode enabled');

        $http = new Http(
            "Bot {$this->token}",
            Loop::get(),
            $this->logger,
            $driver
        );

        $this->rest = new Rest($http, $this->logger);

        return $this;
    }
}
