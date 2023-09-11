<?php

namespace CommandString\PHPCord\Gateway;

interface Websocket
{
    public function __construct(string $uri);

    public function start(): void;

    /**
     * @param callable $callback function(string $message, self $websocket): void
     */
    public function onMessage(callable $callback): void;

    /**
     * @param callable $callback function (string $code, string $reason, self $websocket): void
     */
    public function onClose(callable $callback): void;

    /**
     * @param callable $callback function (self $websocket): void
     */
    public function onConnected(callable $callback): void;

    public function send(string $message): void;

    public function close(): void;
}
