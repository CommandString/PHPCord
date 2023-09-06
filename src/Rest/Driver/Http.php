<?php

namespace CommandString\PHPCord\Rest\Driver;

use CommandString\PHPCord\Helpers\HandleErrorTrait;
use Psr\Log\LoggerInterface;
use React\Promise\PromiseInterface;
use stdClass;
use Throwable;
use Tnapf\JsonMapper\Mapper;
use Discord\Http\Http as DiscordHttp;

abstract class Http
{
    use HandleErrorTrait;

    private readonly Mapper $mapper;

    public function __construct(
        private DiscordHttp $http,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        $this->mapper = new Mapper();
    }

    protected function map(string $class, array|stdClass $data): mixed
    {
        $makeArray = static function (stdClass|array $data) use (&$makeArray): array {
            if ($data instanceof stdClass) {
                $data = (array)$data;
            }

            foreach ($data as $key => $value) {
                if ($value instanceof stdClass || is_array($value)) {
                    $data[$key] = $makeArray($value);
                }
            }

            return $data;
        };

        $data = $makeArray($data);

        try {
            return $this->mapper->map(
                $class,
                $data
            );
        } catch (Throwable $e) {
            $this->handleError($e);

            return new $class();
        }
    }

    protected function sendRequest(Request $request): PromiseInterface
    {
        $method = $request->getMethod()->value;

        return $this->http->$method(
            $request->getUrl(),
            $request->getBody(),
            $request->getHeaders()
        )->then(
            static function ($response) {
                return $response;
            },
            $this->handleError(...)
        );
    }

    protected function mapRequest(Request $request, string $class): PromiseInterface
    {
        return $this->sendRequest($request)->then(
            function ($response) use ($class) {
                return $this->map(
                    $class,
                    $response
                );
            },
            $this->handleError(...)
        );
    }

    protected function mapArrayRequest(Request $request, string $class): PromiseInterface
    {
        return $this->sendRequest($request)->then(
            function ($response) use ($class) {
                $array = [];

                foreach ($response as $item) {
                    $array[] = $this->map(
                        $class,
                        $item
                    );
                }

                return $array;
            },
            $this->handleError(...)
        );
    }
}
