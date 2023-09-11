<?php

namespace CommandString\PHPCord\Gateway;

use CommandString\PHPCord\Gateway\Events\Ready;
use CommandString\PHPCord\Gateway\Events\TypingStart;
use CommandString\PHPCord\Gateway\OpCodes\GenericOpCode;
use CommandString\PHPCord\Gateway\OpCodes\Hello\HelloOpCode;
use CommandString\PHPCord\Gateway\OpCodes\Identity\ConnectionProperties;
use CommandString\PHPCord\Gateway\OpCodes\Identity\IdentityData;
use CommandString\PHPCord\Gateway\OpCodes\OpCode;
use CommandString\PHPCord\Helpers\HandleErrorTrait;
use Evenement\EventEmitter;
use Psr\Log\LoggerInterface;
use Throwable;
use Tnapf\JsonMapper\Mapper;

class Gateway extends EventEmitter
{
    use HandleErrorTrait;

    /**
     * Emitted when a raw message is received from the gateway.
     */
    public const MESSAGE_RAW = 'message.raw';

    /**
     * Emitted when a message is received from the gateway.
     */
    public const MESSAGE = 'message';

    private Websocket $socket;
    private bool $started = false;
    private Mapper $mapper;
    private HeartBeatManager $heartBeatManager;

    /**
     * @var Intent[]
     */
    private array $intents = [];

    public function __construct(
        private readonly string $token,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        $this->socket = new Ratchet('wss://gateway.discord.gg/?v=10&encoding=json');
        $this->mapper = new Mapper();
    }

    public function start(): void
    {
        if ($this->started === true) {
            return;
        }

        $this->socket->onMessage(function (string $message, Websocket $websocket): void {
            try {
                $this->emit(self::MESSAGE_RAW, [$message, $websocket]);
                $message = json_decode($message, true);

                if (!$message) {
                    return;
                }

                $map = match ($message['op']) {
                    OpCode::HELLO->value => HelloOpCode::class,
                    default => null
                };

                if ($message['op'] === OpCode::DISPATCH->value || $map === null) {
                    $message = $this->mapper->map(GenericOpCode::class, $message);
                } else {
                    $message = $this->mapper->map($map, $message);
                }

                $this->emit("opcode.{$message->op->value}", [$message]);
                $this->emit(self::MESSAGE, [$message]);
            } catch (Throwable $e) {
                $this->handleError($e);
            }
        });

        $this->onceOpCode(OpCode::HELLO, function (HelloOpCode $data) {
            try {
                $this->heartBeatManager = new HeartBeatManager(
                    $data->d->heartbeatInterval,
                    $this,
                    $this->logger
                );

                $this->heartBeatManager->start();

                $identity = new IdentityData();
                $identity->token = $this->token;
                $identity->intents = array_reduce($this->intents, static fn (int $carry, Intent $intent) => $carry | $intent->value, 0);
                $identity->properties = new ConnectionProperties();
                $identity->properties->os = PHP_OS_FAMILY;
                $identity->properties->browser = 'PHPCord';
                $identity->properties->device = 'PHPCord';

                $code = new GenericOpCode();
                $code->op = OpCode::IDENTIFY;
                $code->d = $identity;

                $this->sendOpCode($code);
            } catch (Throwable $e) {
                $this->handleError($e);
            }
        });

        $this->onOpCode(OpCode::DISPATCH, function (GenericOpCode $data) {
            try {
                if (!isset($data->t)) {
                    return;
                }

                $event = Event::tryFrom($data->t);

                $map = match ($event) {
                    Event::TYPING_START => TypingStart::class,
                    Event::READY => Ready::class,
                    default => null
                };

                if ($map === null) {
                    return;
                }

                $this->emit("event.{$data->t}", [$this->mapper->map($map, $data->d)]);
            } catch (Throwable $e) {
                $this->handleError($e);
            }
        });

        $this->socket->start();
    }

    public function sendOpCode(GenericOpCode $code): void
    {
        $this->socket->send(json_encode(objectToSnakeCaseArray($code)));
    }

    public function emit($event, array $arguments = []): void
    {
        $arguments[] = $this;
        parent::emit($event, $arguments);
    }

    public function onOpCode(OpCode $code, callable $callback): void
    {
        $this->on("opcode.{$code->value}", $callback);
    }

    public function onceOpCode(OpCode $code, callable $callback): void
    {
        $this->once("opcode.{$code->value}", $callback);
    }

    public function removeOpCodeListener(OpCode $code, callable $callback): void
    {
        $this->removeListener("opcode.{$code->value}", $callback);
    }

    public function onEvent(Event $event, callable $callback): void
    {
        $this->on("event.{$event->name}", $callback);
    }

    public function onceEvent(Event $event, callable $callback): void
    {
        $this->once("event.{$event->name}", $callback);
    }

    public function removeEventListener(Event $event, callable $callback): void
    {
        $this->removeListener("event.{$event->name}", $callback);
    }

    public function withIntents(Intent ...$intents): self
    {
        if ($this->started === true) {
            $this->logger->error('Cannot set intents after gateway has started.');
        } else {
            $this->intents = $intents;
        }

        return $this;
    }
}
