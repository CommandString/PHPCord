<?php

namespace PHPCord\PHPCord\Parts\Interactions;

use PHPCord\PHPCord\Parts\Messages\Message;

class InteractionResponse
{
    public InteractionResponseType $type;
    public Message|Autocomplete|Modal|null $data;
}
