<?php

namespace CommandString\PHPCord\Rest;

use CommandString\PHPCord\Parts\Users\User;
use CommandString\PHPCord\Rest\Driver\Http;
use CommandString\PHPCord\Rest\Driver\Request;
use React\Promise\PromiseInterface;

/**
 * TODO: Implement the rest of the endpoints
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
}
