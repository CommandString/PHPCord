<?php

namespace CommandString\PHPCord\Rest\Driver;

class Request
{
    protected array $headers = [];

    public function __construct(
        protected string $url,
        protected Method $method = Method::GET,
        protected string|array|null $body = null,
        protected array $query = [],
    ) {
    }

    public function getUrl(): string
    {
        return $this->url . '?' . http_build_query($this->query);
    }

    public function withUrl(string $url): Request
    {
        $that = clone $this;
        $that->url = $url;

        return $that;
    }

    public function getMethod(): Method
    {
        return $this->method;
    }

    public function withMethod(Method $method): Request
    {
        $that = clone $this;
        $that->method = $method;

        return $that;
    }

    public function getBody(): ?string
    {
        if (is_array($this->body)) {
            return json_encode($this->body);
        }

        return $this->body;
    }

    public function withBody(string|array $body): Request
    {
        $that = clone $this;
        $that->body = $body;

        return $that;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function withHeader(string $name, string $value): Request
    {
        $that = clone $this;
        $that->headers[$name] = $value;

        return $that;
    }

    public function withHeaders(array $headers): Request
    {
        $that = clone $this;
        $that->headers = $headers;

        return $that;
    }
}
