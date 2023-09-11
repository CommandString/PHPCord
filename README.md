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

use CommandString\PHPCord\Parts\Users\User;
use CommandString\PHPCord\Discord;
use Discord\Http\Drivers\Guzzle;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once __DIR__ . '/vendor/autoload.php';

$client = (new Discord(
    '<token>'
    new Logger('PHPCord', [new StreamHandler('php://stdout')])
))->withRest(
    new Guzzle()
);

$client->rest->users->getCurrent()->then(
    static function (User $user) {
        echo "Current user is {$user->username}";
    }
);
```

