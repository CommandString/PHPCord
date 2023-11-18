<?php

namespace PHPCord\PHPCord\Rest;

use PHPCord\PHPCord\Parts\Channels\Channel;
use PHPCord\PHPCord\Parts\Users\User;
use PHPCord\PHPCord\Rest\Driver\Http;
use PHPCord\PHPCord\Rest\Driver\Method;
use PHPCord\PHPCord\Rest\Driver\Request;
use React\Promise\PromiseInterface;

/**
 * TODO: Finish Bindings
 * Get
 * CreateDm
 * GetConnections
 * GetApplicationRoleConnection
 * UpdateUserRoleConnection
 */
class Users extends Http
{
    public function get(string $id): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::USER, $id)
            ),
            User::class
        );
    }

    public function getCurrent(): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: '/users/@me'
            ),
            User::class
        );
    }

    public function createDm(string $recipientId): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: '/users/@me/channels',
                method: Method::POST,
                body: [
                    'recipient_id' => $recipientId,
                ]
            ),
            Channel::class
        );
    }
}
