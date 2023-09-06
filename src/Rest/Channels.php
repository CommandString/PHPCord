<?php

namespace CommandString\PHPCord\Rest;

use CommandString\PHPCord\Abstractions\Channels\Channel;
use CommandString\PHPCord\Rest\Driver\Http;
use CommandString\PHPCord\Rest\Driver\Method;
use CommandString\PHPCord\Rest\Driver\Request;
use Discord\Http\Endpoint;
use React\Promise\PromiseInterface;

/**
 * TODO: Finish bindings
 * modify
 * delete
 * getMessages
 * getMessage
 * createMessage
 * crosspostMessage
 * createReaction
 * deleteOwnReaction
 * deleteUserReaction
 * getReactions
 * deleteAllReactions
 * deleteAllReactionsForEmoji
 * editMessage
 * deleteMessage
 * bulkDeleteMessages
 * editChannelPermissions
 * getChannelInvites
 * createChannelInvite
 * deleteChannelPermission
 * followAnnouncementChannel
 * triggerTypingIndicator
 * getPinnedMessage
 * pinMessage
 * unpinMessage
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

    public function createMessage(string $channelId, string $content): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_MESSAGES, $channelId),
                method: Method::POST,
                body: [
                    'content' => $content,
                ]
            )
        );
    }
}
