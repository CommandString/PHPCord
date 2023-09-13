<?php

namespace PHPCord\PHPCord\MapperTypes;

use Attribute;
use Tnapf\JsonMapper\Attributes\CallbackType;
use Tnapf\JsonMapper\MapperInterface;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ConstructorType extends CallbackType
{
    public function __construct(
        string $name,
        public readonly string $class,
        bool $nullable = false
    ) {
        parent::__construct($name, $nullable);
    }

    public function map(mixed $data, MapperInterface $mapper): object
    {
        return new $this->class($data);
    }

    public function isType(mixed $data): bool
    {
        return $data instanceof $this->class;
    }
}
