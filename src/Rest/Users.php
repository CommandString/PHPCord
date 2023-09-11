<?php

namespace CommandString\PHPCord\Rest;

use CommandString\PHPCord\Parts\Channels\Channel;
use CommandString\PHPCord\Parts\Users\User;
use CommandString\PHPCord\Rest\Driver\Http;
use CommandString\PHPCord\Rest\Driver\Method;
use CommandString\PHPCord\Rest\Driver\Request;
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
                    'recipient_id' => $recipientId
                ]
            ),
            Channel::class
        );
    }
}
