<?php

namespace PHPCord\PHPCord\Builders;

use PHPCord\PHPCord\Parts\Messages\Components\MessageComponent;
use PHPCord\PHPCord\Parts\Messages\Message;
use PHPCord\PHPCord\Parts\Messages\MessageFlag;
use PHPCord\PHPCord\Parts\Messages\MessageReference;

// TODO: Finish builder
class MessageBuilder implements BuilderInterface
{
    private Message $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    public function withContent(string $content): self
    {
        $this->message->content = $content;

        return $this;
    }

    public function withFlags(MessageFlag ...$flags): self
    {
        $flags = array_reduce($flags, static function (int $flags, MessageFlag $flag) {
            return $flags | $flag->value;
        }, 0);

        $this->message->flags = $flags;

        return $this;
    }

    public function withComponent(MessageComponent $component): self {
        $this->message->components[] = $component;

        return $this;
    }

    public function replyTo(string $messageId): self
    {
        if (!isset($this->message->messageReference)) {
            $this->message->messageReference = new MessageReference();
        }

        $this->message->messageReference->messageId = $messageId;

        return $this;
    }

    public function build(): Message
    {
        return $this->message;
    }
}
