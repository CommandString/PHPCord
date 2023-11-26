<?php

namespace PHPCord\PHPCord\Rest;

use Discord\Http\Endpoint;
use PHPCord\PHPCord\Parts\Channels\Channel;
use PHPCord\PHPCord\Parts\Guilds\Guild;
use PHPCord\PHPCord\Parts\Guilds\GuildPreview;
use PHPCord\PHPCord\Parts\Guilds\Invite;
use PHPCord\PHPCord\Parts\Guilds\Member;
use PHPCord\PHPCord\Rest\Driver\Http;
use PHPCord\PHPCord\Rest\Driver\Request;
use React\Promise\PromiseInterface;

/**
 * TODO: Finish bindings
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

    public function getInvites(string $guildId): PromiseInterface
    {
        return $this->mapArrayRequest(
            new Request(
                url: Endpoint::bind(Endpoint::GUILD_INVITES, $guildId),
            ),
            class: Invite::class
        );
    }

    public function listMembers(string $guildId, int $limit = 1000, ?string $after = null): PromiseInterface
    {
        return $this->mapArrayRequest(
            new Request(
                url: Endpoint::bind(Endpoint::GUILD_MEMBERS, $guildId),
                query: compact('limit', 'after'),
            ),
            class: Member::class
        );
    }
}
