<?php

namespace PHPCord\PHPCord\Parts\Messages\Components;

class ActionRow extends MessageComponent
{
    public MessageComponentType $type = MessageComponentType::ACTION_ROW;
    public array $components;
}
