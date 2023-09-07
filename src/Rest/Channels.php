<?php

namespace CommandString\PHPCord\Rest;

use CommandString\PHPCord\Parts\Channels\Channel;
use CommandString\PHPCord\Parts\Messages\Message;
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

    public function createMessage(string $channelId, Message $message): PromiseInterface
    {
        return $this->sendRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_MESSAGES, $channelId),
                method: Method::POST,
                body: objectToSnakeCaseArray($message)
            )
        );
    }

    public function getMessage(string $channelId, string $messageId): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL_MESSAGE, $channelId, $messageId),
            ),
            Message::class
        );
    }

    public function modify(string $channelId, Channel $channel): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::CHANNEL, $channelId),
                method: Method::PATCH,
                body: get_object_vars($channel)
            ),
            Channel::class
        );
    }
}
