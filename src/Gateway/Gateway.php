<?php

namespace PHPCord\PHPCord\Gateway;

use PHPCord\PHPCord\Gateway\Events\GuildMemberAdd;
use PHPCord\PHPCord\Gateway\Events\GuildMemberRemove;
use PHPCord\PHPCord\Gateway\Events\MessageCreate;
use PHPCord\PHPCord\Gateway\Events\Ready;
use PHPCord\PHPCord\Gateway\Events\TypingStart;
use PHPCord\PHPCord\Gateway\OpCodes\GenericOpCode;
use PHPCord\PHPCord\Gateway\OpCodes\Hello\HelloOpCode;
use PHPCord\PHPCord\Gateway\OpCodes\Identity\ConnectionProperties;
use PHPCord\PHPCord\Gateway\OpCodes\Identity\IdentityData;
use PHPCord\PHPCord\Gateway\OpCodes\OpCode;
use PHPCord\PHPCord\Helpers\HandleErrorTrait;
use Evenement\EventEmitter;
use PHPCord\PHPCord\Parts\Interactions\Interaction;
use PHPCord\PHPCord\Parts\Interactions\InteractionApplicationCommandData;
use PHPCord\PHPCord\Parts\Interactions\InteractionMessageComponentData;
use PHPCord\PHPCord\Parts\Interactions\InteractionModalSubmitData;
use PHPCord\PHPCord\Parts\Interactions\InteractionType;
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
                $mappedData = null;

                $map = match ($event) {
                    Event::TYPING_START => TypingStart::class,
                    Event::READY => Ready::class,
                    Event::GUILD_MEMBER_ADD => GuildMemberAdd::class,
                    Event::GUILD_MEMBER_REMOVE => GuildMemberRemove::class,
                    Event::MESSAGE_CREATE => MessageCreate::class,
                    default => null
                };

                if ($map !== null) {
                    $mappedData = $this->mapper->map($map, $data->d);
                }

                if ($event === Event::INTERACTION_CREATE) {
                    // TODO: refactor
                    $type = InteractionType::tryFrom($data->d['type']);

                    $map = match ($type) {
                        InteractionType::APPLICATION_COMMAND => InteractionApplicationCommandData::class,
                        InteractionType::MESSAGE_COMPONENT => InteractionMessageComponentData::class,
                        InteractionType::MODAL_SUBMIT => InteractionModalSubmitData::class,
                        default => null
                    };

                    /** @var array $interactionData */
                    $interactionData = $data->d['data'];
                    unset($data->d['data']);

                    if ($map !== null) {
                        $mappedData = $this->mapper->map(Interaction::class, $data->d);
                        $interactionData = $this->mapper->map($map, $interactionData);
                        /** @var InteractionModalSubmitData|InteractionApplicationCommandData|InteractionMessageComponentData $interactionData */
                        $mappedData->data = $interactionData;
                    }
                }

                if ($mappedData === null) {
                    return;
                }

                $this->emit("event.{$data->t}", [$mappedData]);
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
