# PHPCord

A modern Discord API wrapper for PHP

**NOTE**: This is still in development and is not ready for production use

## Requirements

- PHP 8.1+
- Composer

## Resources

- [Discord Developer Portal](https://discord.com/developers/docs/intro)

## Installation

```bash
composer require phpcord/phpcord
```

## Example

```php
<?php

use PHPCord\PHPCord\Builders\MessageBuilder;
use PHPCord\PHPCord\Discord;
use PHPCord\PHPCord\Gateway\Event;
use PHPCord\PHPCord\Gateway\Events\TypingStart;
use PHPCord\PHPCord\Gateway\Intent;
use Discord\Http\Drivers\Guzzle;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once __DIR__ . '/vendor/autoload.php';

$bot = (new Discord(
    '<token>',
    new Logger('PHPCord', [new StreamHandler('php://stdout')])
))->withRest(
    new Guzzle(options: ['verify' => false])
)->withGateway();

$bot->gateway->onEvent(Event::TYPING_START, static function (TypingStart $typing) use ($bot) {
    $bot->rest->messages->create(
        $typing->channelId,
        (new MessageBuilder())
            ->withContent('Typing...')
            ->build()
    );
});

$bot->gateway->withIntents(
    Intent::DIRECT_MESSAGE_TYPING, 
    Intent::GUILD_MESSAGE_TYPING
)->start();

```

