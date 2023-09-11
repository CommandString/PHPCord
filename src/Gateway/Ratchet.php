<?php

namespace PHPCord\PHPCord\Gateway;

use Evenement\EventEmitter;

use function Ratchet\Client\connect;

class Ratchet extends EventEmitter implements Websocket
{
    private const MESSAGE_RECEIVED = 'message.received';
    private const MESSAGE_SEND = 'message.send';
    private const CLOSE = 'close';
    private const CLOSED = 'closed';
    private const CONNECTED = 'connected';

    public function __construct(private readonly string $uri)
    {
    }

    public function start(): void
    {
        connect($this->uri)->then(function ($conn) {
            $conn->on('message', function ($msg) {
                $this->emit(self::MESSAGE_RECEIVED, [(string)$msg, $this]);
            });

            $this->on(self::MESSAGE_SEND, static function (string $msg) use ($conn) {
                $conn->send($msg);
            });

            $conn->on('close', function (?int $code = null, ?string $reason = null) {
                $this->emit(self::CLOSED, [$code, $reason, $this]);
            });

            $this->on(self::CLOSE, static function () use ($conn) {
                $conn->close();
            });

            $this->emit(self::CONNECTED, [$this]);
        });
    }

    public function onMessage(callable $callback): void
    {
        $this->on(self::MESSAGE_RECEIVED, $callback);
    }

    public function onClose(callable $callback): void
    {
        $this->on(self::CLOSED, $callback);
    }

    public function onConnected(callable $callback): void
    {
        $this->on(self::CONNECTED, $callback);
    }

    public function send(string $message): void
    {
        $this->emit(self::MESSAGE_SEND, [$message]);
    }

    public function close(): void
    {
        $this->emit(self::CLOSE);
    }
}
