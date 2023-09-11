<?php

namespace PHPCord\PHPCord\Rest;

use PHPCord\PHPCord\Parts\Channels\Channel;
use PHPCord\PHPCord\Rest\Driver\Http;
use PHPCord\PHPCord\Rest\Driver\Method;
use PHPCord\PHPCord\Rest\Driver\Request;
use Discord\Http\Endpoint;
use React\Promise\PromiseInterface;

/**
 * TODO: Finish bindings
 * delete
 * editChannelPermissions
 * getChannelInvites
 * createChannelInvite
 * deleteChannelPermission
 * followAnnouncementChannel
 * groupDmAddRecipient
 * groupDmRemoveRecipient
 * startThread
 * joinTread
 * addThreadMember
 * leaveThread
 * removeThreadMember
 * getThreadMember
 * listThreadMembers
 * listPublicArchivedThreads
 * listPrivateArchivedThreads
 * listJoinedPrivateArchivedThreads
 */
class Channels extends Http
{
    public function get(string $channelId): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL, $channelId),
            ),
            Channel::class
        );
    }

    public function modify(string $channelId, Channel $channel): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL, $channelId),
                method: Method::PATCH,
                body: objectToSnakeCaseArray($channel)
            ),
            Channel::class
        );
    }

    public function triggerTyping(string $channelId): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_TYPING, $channelId),
                method: Method::POST
            )
        );
    }
}
