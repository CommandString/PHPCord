<?php

namespace PHPCord\PHPCord\Gateway;

use PHPCord\PHPCord\Gateway\OpCodes\GenericOpCode;
use PHPCord\PHPCord\Gateway\OpCodes\OpCode;
use Psr\Log\LoggerInterface;
use React\EventLoop\Loop;

class HeartBeatManager
{
    private bool $started = false;

    public function __construct(
        private readonly int $heartbeatInterval,
        private readonly Gateway $gateway,
        private readonly LoggerInterface $logger,
        private ?int $lastSequence = null
    ) {
        $this->gateway->on(Gateway::MESSAGE, function (GenericOpCode $message) {
            if ($message?->s ?? false) {
                $this->lastSequence = $message->s;
            }
        });
    }

    public function start(): void
    {
        if ($this->started === true) {
            return;
        }

        $this->started = true;

        $this->logger->debug('Heartbeat started.');

        $this->gateway->onOpCode(OpCode::HEARTBEAT_ACK, function () {
            $this->logger->debug('Heartbeat acknowledged.');
        });

        $this->gateway->onOpCode(OpCode::HEARTBEAT, function () {
            $this->logger->debug('Heartbeat requested.');
            $this->sendHeartBeat();
        });

        Loop::get()->addTimer($this->heartbeatInterval / 1000, function () {
            $this->sendHeartBeat();

            Loop::get()->addPeriodicTimer($this->heartbeatInterval / 1000, function () {
                $this->sendHeartBeat();
            });
        });
    }

    private function sendHeartBeat(): void
    {
        $heartbeat = new GenericOpCode();
        $heartbeat->op = OpCode::HEARTBEAT;
        $heartbeat->d = $this->lastSequence;

        $this->logger->debug('Heartbeat sent.');
        $this->gateway->sendOpCode($heartbeat);
    }
}
