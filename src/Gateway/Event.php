<?php

namespace PHPCord\PHPCord\Gateway;

enum Event: string
{
    case HELLO = 'HELLO';
    case READY = 'READY';
    case RESUMED = 'RESUMED';
    case RECONNECT = 'RECONNECT';
    case INVALID_SESSION = 'INVALID_SESSION';
    case APPLICATION_COMMAND_PERMISSIONS_UPDATE = 'APPLICATION_COMMAND_PERMISSIONS_UPDATE';
    case AUTO_MODERATION_RULE_CREATE = 'AUTO_MODERATION_RULE_CREATE';
    case AUTO_MODERATION_RULE_UPDATE = 'AUTO_MODERATION_RULE_UPDATE';
    case AUTO_MODERATION_RULE_DELETE = 'AUTO_MODERATION_RULE_DELETE';
    case AUTO_MODERATION_ACTION_EXECUTION = 'AUTO_MODERATION_ACTION_EXECUTION';
    case CHANNEL_CREATE = 'CHANNEL_CREATE';
    case CHANNEL_UPDATE = 'CHANNEL_UPDATE';
    case CHANNEL_DELETE = 'CHANNEL_DELETE';
    case CHANNEL_PINS_UPDATE = 'CHANNEL_PINS_UPDATE';
    case THREAD_CREATE = 'THREAD_CREATE';
    case THREAD_UPDATED = 'THREAD_UPDATE';
    case THREAD_DELETE = 'THREAD_DELETE';
    case THREAD_LIST_SYNC = 'THREAD_LIST_SYNC';
    case THREAD_MEMBER_UPDATE = 'THREAD_MEMBER_UPDATE';
    case THREAD_MEMBERS_UPDATE = 'THREAD_MEMBERS_UPDATE';
    case GUILD_CREATE = 'GUILD_CREATE';
    case GUILD_UPDATE = 'GUILD_UPDATE';
    case GUILD_DELETE = 'GUILD_DELETE';
    case GUILD_AUDIT_LOG_ENTRY_CREATE = 'GUILD_AUDIT_LOG_ENTRY_CREATE';
    case GUILD_BAN_ADD = 'GUILD_BAN_ADD';
    case GUILD_BAN_REMOVE = 'GUILD_BAN_REMOVE';
    case GUILD_EMOJIS_UPDATE = 'GUILD_EMOJIS_UPDATE';
    case GUILD_STICKERS_UPDATE = 'GUILD_STICKERS_UPDATE';
    case GUILD_INTEGRATIONS_UPDATE = 'GUILD_INTEGRATIONS_UPDATE';
    case GUILD_MEMBER_ADD = 'GUILD_MEMBER_ADD';
    case GUILD_MEMBER_REMOVE = 'GUILD_MEMBER_REMOVE';
    case GUILD_MEMBER_UPDATE = 'GUILD_MEMBER_UPDATE';
    case GUILD_MEMBERS_CHUNK = 'GUILD_MEMBERS_CHUNK';
    case GUILD_ROLE_CREATE = 'GUILD_ROLE_CREATE';
    case GUILD_ROLE_UPDATE = 'GUILD_ROLE_UPDATE';
    case GUILD_ROLE_DELETE = 'GUILD_ROLE_DELETE';
    case GUILD_SCHEDULED_EVENT_CREATE = 'GUILD_SCHEDULED_EVENT_CREATE';
    case GUILD_SCHEDULED_EVENT_UPDATE = 'GUILD_SCHEDULED_EVENT_UPDATE';
    case GUILD_SCHEDULED_EVENT_DELETE = 'GUILD_SCHEDULED_EVENT_DELETE';
    case GUILD_SCHEDULED_EVENT_USER_ADD = 'GUILD_SCHEDULED_EVENT_USER_ADD';
    case GUILD_SCHEDULED_EVENT_USER_REMOVE = 'GUILD_SCHEDULED_EVENT_USER_REMOVE';
    case INTEGRATION_CREATE = 'INTEGRATION_CREATE';
    case INTEGRATION_UPDATE = 'INTEGRATION_UPDATE';
    case INTEGRATION_DELETE = 'INTEGRATION_DELETE';
    case INTERACTION_CREATE = 'INTERACTION_CREATE';
    case INVITE_CREATE = 'INVITE_CREATE';
    case INVITE_DELETE = 'INVITE_DELETE';
    case MESSAGE_CREATE = 'MESSAGE_CREATE';
    case MESSAGE_UPDATE = 'MESSAGE_UPDATE';
    case MESSAGE_DELETE = 'MESSAGE_DELETE';
    case MESSAGE_DELETE_BULK = 'MESSAGE_DELETE_BULK';
    case MESSAGE_REACTION_ADD = 'MESSAGE_REACTION_ADD';
    case MESSAGE_REACTION_REMOVE = 'MESSAGE_REACTION_REMOVE';
    case MESSAGE_REACTION_REMOVE_ALL = 'MESSAGE_REACTION_REMOVE_ALL';
    case MESSAGE_REACTION_REMOVE_EMOJI = 'MESSAGE_REACTION_REMOVE_EMOJI';
    case PRESENCE_UPDATE = 'PRESENCE_UPDATE';
    case STAGE_INSTANCE_CREATE = 'STAGE_INSTANCE_CREATE';
    case STAGE_INSTANCE_UPDATE = 'STAGE_INSTANCE_UPDATE';
    case STAGE_INSTANCE_DELETE = 'STAGE_INSTANCE_DELETE';
    case TYPING_START = 'TYPING_START';
    case USER_UPDATE = 'USER_UPDATE';
    case VOICE_STATE_UPDATE = 'VOICE_STATE_UPDATE';
    case VOICE_SERVER_UPDATE = 'VOICE_SERVER_UPDATE';
    case WEBHOOKS_UPDATE = 'WEBHOOKS_UPDATE';
}
