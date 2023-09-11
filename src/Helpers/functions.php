<?php

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

function objectToSnakeCaseArray(object $class): array
{
    $converter = new SnakeToCamelCase();

    $array = [];
    foreach (get_object_vars($class) as $key => $value) {
        $key = $converter->convertFromCase($key);

        if (is_object($value)) {
            if (is_subclass_of($value, BackedEnum::class)) {
                $array[$key] = $value->value;

                continue;
            }

            $array[$key] = objectToSnakeCaseArray($value);
        } else {
            $array[$key] = $value;
        }
    }

    return $array;
}
