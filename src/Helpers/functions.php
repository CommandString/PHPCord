<?php

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

function objectToSnakeCaseArray(object $class): array
{
    $converter = new SnakeToCamelCase();

    $loopArray = static function (array $givenArray) use ($converter, &$loopArray): array {
        $array = [];
        foreach ($givenArray as $key => $value) {
            $key = $converter->convertFromCase($key);

            if (is_object($value)) {
                if (is_subclass_of($value, BackedEnum::class)) {
                    $array[$key] = $value->value;

                    continue;
                }

                $array[$key] = objectToSnakeCaseArray($value);
            } elseif (is_array($value)) {
                $array[$key] = $loopArray($value);
            } else {
                $array[$key] = $value;
            }
        }

        return $array;
    };

    return $loopArray(get_object_vars($class));
}
