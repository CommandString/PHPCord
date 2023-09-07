<?php

namespace CommandString\PHPCord\Builders;

use CommandString\PHPCord\Parts\Messages\Message;
use CommandString\PHPCord\Parts\Messages\MessageReference;

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
