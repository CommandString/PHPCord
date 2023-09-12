<?php

namespace PHPCord\PHPCord\Rest;

use Discord\Http\Endpoint;
use PHPCord\PHPCord\Parts\Interactions\InteractionResponse;
use PHPCord\PHPCord\Parts\Messages\Message;
use PHPCord\PHPCord\Rest\Driver\Http;
use PHPCord\PHPCord\Rest\Driver\Method;
use PHPCord\PHPCord\Rest\Driver\Request;
use React\Promise\PromiseInterface;

class Interactions extends Http
{
    public function createResponse(string $interactionId, string $interactionToken, InteractionResponse $response): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                Endpoint::bind(Endpoint::INTERACTION_RESPONSE, $interactionId, $interactionToken),
                Method::POST,
                objectToSnakeCaseArray($response)
            )
        );
    }

    public function getResponse(string $applicationId, string $interactionToken): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::INTERACTION_RESPONSE, $applicationId, $interactionToken),
                Method::GET
            ),
            Message::class
        );
    }

    public function editResponse(string $applicationId, string $interactionToken, Message $message): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::INTERACTION_RESPONSE, $applicationId, $interactionToken),
                Method::PATCH,
                objectToSnakeCaseArray($message)
            ),
            Message::class
        );
    }

    public function deleteResponse(string $applicationId, string $interactionToken): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                Endpoint::bind(Endpoint::INTERACTION_RESPONSE, $applicationId, $interactionToken),
                Method::DELETE
            )
        );
    }

    public function createFollowup(string $applicationId, string $interactionToken, Message $message): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::INTERACTION_FOLLOW_UP, $applicationId, $interactionToken),
                Method::POST,
                objectToSnakeCaseArray($message)
            ),
            Message::class
        );
    }

    public function getFollowup(string $applicationId, string $interactionToken, string $messageId): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::INTERACTION_FOLLOW_UP, $applicationId, $interactionToken, $messageId),
                Method::GET
            ),
            Message::class
        );
    }

    public function editFollowup(string $applicationId, string $interactionToken, string $messageId, Message $message): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                Endpoint::bind(Endpoint::INTERACTION_FOLLOW_UP, $applicationId, $interactionToken, $messageId),
                Method::PATCH,
                objectToSnakeCaseArray($message)
            ),
            Message::class
        );
    }

    public function deleteFollowup(string $applicationId, string $interactionToken, string $messageId): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                Endpoint::bind(Endpoint::INTERACTION_FOLLOW_UP, $applicationId, $interactionToken, $messageId),
                Method::DELETE
            )
        );
    }
}
