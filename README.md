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
use Discord\Http\Drivers\Guzzle;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPCord\PHPCord\Gateway\Event;
use PHPCord\PHPCord\Gateway\Events\Ready;
use PHPCord\PHPCord\Parts\Commands\ApplicationCommand;
use PHPCord\PHPCord\Parts\Commands\ApplicationCommandOption;
use PHPCord\PHPCord\Parts\Commands\ApplicationCommandOptionChoice;
use PHPCord\PHPCord\Parts\Commands\ApplicationCommandOptionType;
use PHPCord\PHPCord\Parts\Interactions\Interaction;
use PHPCord\PHPCord\Parts\Interactions\InteractionResponse;
use PHPCord\PHPCord\Parts\Interactions\InteractionResponseType;
use PHPCord\PHPCord\Parts\Interactions\InteractionType;
use PHPCord\PHPCord\Parts\Messages\MessageFlag;
use function React\Async\await;

require_once __DIR__ . '/vendor/autoload.php';

// ignore the fact I made this a constant. 😵‍💫
const LOGGER = new Logger('PHPCord', [new StreamHandler('php://stdout')]);

$bot = (new Discord(
    TOKEN,
    LOGGER
))->withRest(
    new Guzzle(options: ['verify' => false])
)->withGateway();

define('START_TIME', time());

$bot->gateway->onEvent(Event::READY, static function (Ready $ready) use ($bot) {
    LOGGER->info("{$ready->user->username} is ready!");

    return; // remove to register command

    $command = new ApplicationCommand();
    $command->name = 'status';
    $command->description = 'Get the status of the bot';

    $typeOption = new ApplicationCommandOption();
    $typeOption->name = 'type';
    $typeOption->description = 'The type of status';
    $typeOption->type = ApplicationCommandOptionType::STRING;
    $typeOption->required = true;

    $typeOptionRam = new ApplicationCommandOptionChoice();
    $typeOptionRam->name = $typeOptionRam->value = 'ram';

    $typeOptionUptime = new ApplicationCommandOptionChoice();
    $typeOptionUptime->name = $typeOptionUptime->value = 'uptime';

    $typeOption->choices = [$typeOptionRam, $typeOptionUptime];
    $command->options = [$typeOption];

    await($bot->rest->guildCommands->createCommand($ready->application->id, '988910112825548811', $command));

    LOGGER->info('Created status command!');
});

$bot->gateway->onEvent(Event::INTERACTION_CREATE, static function (Interaction $interaction) use ($bot) {
    if (
        $interaction->type !== InteractionType::APPLICATION_COMMAND ||
        $interaction->data->name !== 'status'
    ) {
        return;
    }

    $type = $interaction->data->options[0]->value;

    if ($type === 'ram') {
        $messageContent = 'RAM Usage is ' . round(memory_get_usage() / 1024 / 1024, 2) . 'MB';
    } else if ($type === 'uptime') {
        $messageContent = 'The bot was started <t:' . START_TIME . ':R>';
    }

    $response = new InteractionResponse();
    $response->type = InteractionResponseType::CHANNEL_MESSAGE_WITH_SOURCE;
    $response->data = (new MessageBuilder())
        ->withContent($messageContent)
        ->withFlags(MessageFlag::EPHEMERAL)
        ->build();

    $bot->rest->interactions->createResponse(
        $interaction->id,
        $interaction->token,
        $response
    );
});

$bot->gateway->start();
```

