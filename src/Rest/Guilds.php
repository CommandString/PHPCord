<?php

namespace PHPCord\PHPCord\Rest;

use PHPCord\PHPCord\Parts\Channels\Channel;
use PHPCord\PHPCord\Parts\Guilds\Guild;
use PHPCord\PHPCord\Rest\Driver\Http;
use PHPCord\PHPCord\Rest\Driver\Request;
use Discord\Http\Endpoint;
use React\Promise\PromiseInterface;

/**
 * TODO: Finish bindings
 * getPreview
 * modify
 * delete
 * createChannel
 * modifyChannelPositions
 * listActiveThreads
 * searchMembers
 * addMember
 * modifyMember
 * modifyCurrentMember
 * modifyCurrentNick
 * addMemberRole
 * removeMemberRole
 * removeMember
 * getBans
 * getBan
 * createBan
 * removeBan
 * getRoles
 * createRole
 * modifyRolePositions
 * modifyRole
 * modifyMFALevel
 * deleteRole
 * getPruneCount
 * beginPrune
 * getVoiceRegions
 * getInvites
 * getIntegrations
 * deleteIntegration
 * getWidgetSettings
 * modifyWidget
 * getWidget
 * getVanityUrl
 * getWidgetImage
 * getWelcomeScreen
 * modifyWelcomeScreen
 * getOnboarding
 * modifyOnboarding
 * modifyCurrentUserVoiceState
 * ModifyUserVoiceState
 */
class Guilds extends Http
{
    public function get(string $guildId, bool $withCounts = false): PromiseInterface
    {
        return $this->mapRequest(
            new Request(
                url: Endpoint::bind(Endpoint::GUILD, $guildId),
                query: [
                    'with_counts' => $withCounts,
                ],
            ),
            class: Guild::class
        );
    }

    public function getChannels(string $guildId): PromiseInterface
    {
        return $this->mapArrayRequest(
            new Request(
                url: Endpoint::bind(Endpoint::GUILD_CHANNELS, $guildId),
            ),
            class: Channel::class
        );
    }
}
