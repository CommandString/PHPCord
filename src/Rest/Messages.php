<?php

namespace PHPCord\PHPCord\Rest;

use PHPCord\PHPCord\Parts\Messages\Message;
use PHPCord\PHPCord\Rest\Driver\Http;
use PHPCord\PHPCord\Rest\Driver\Method;
use PHPCord\PHPCord\Rest\Driver\Request;
use Discord\Http\Endpoint;
use React\Promise\PromiseInterface;

use function PHPCord\PHPCord\Helpers\objectToSnakeCaseArray;

/**
 * TODO: Finish bindings
 * crosspost
 * bulkDelete
 * getPinned
 * createReaction
 * deleteOwnReaction
 * deleteUserReaction
 * getReactions
 * deleteAllReactions
 * deleteAllReactionsForEmoji
 */
class Messages extends Http
{
    // TODO: Add ability to accept uploaded files
    public function get(string $channelId, string $messageId): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_MESSAGE, $channelId, $messageId),
            ),
            Message::class
        );
    }

    public function create(string $channelId, Message $message): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_MESSAGES, $channelId),
                method: Method::POST,
                body: objectToSnakeCaseArray($message)
            ),
            Message::class
        );
    }

    // TODO: Add ability to accept uploaded files
    public function edit(string $channelId, string $messageId, Message $message): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_MESSAGE, $channelId, $messageId),
                method: Method::PATCH,
                body: objectToSnakeCaseArray($message)
            ),
            Message::class
        );
    }

    public function delete(string $channelId, string $messageId): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_MESSAGE, $channelId, $messageId),
                method: Method::DELETE
            )
        );
    }

    public function pin(string $channelId, string $messageId): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_PIN, $channelId, $messageId),
                method: Method::PUT
            )
        );
    }

    public function unpin(string $channelId, string $messageId): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_PIN, $channelId, $messageId),
                method: Method::DELETE
            )
        );
    }

    public function pins(string $channelId): PromiseInterface
    {
        return $this->mapArrayRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_PINS, $channelId),
            ),
            Message::class
        );
    }
}
