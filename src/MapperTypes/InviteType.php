<?php

namespace PHPCord\PHPCord\MapperTypes;

use PHPCord\PHPCord\Parts\Guilds\Invite;
use PHPCord\PHPCord\Parts\Guilds\Invites\InviteMetaData;
use Tnapf\JsonMapper\Attributes\MappableType;
use Tnapf\JsonMapper\MapperInterface;

class InviteType extends MappableType
{
    public function map(mixed $data, MapperInterface $mapper): mixed
    {
        $metaDataKeys = ['uses', 'max_uses', 'max_age', 'temporary', 'created_at'];

        $map = InviteMetaData::class;

        foreach ($metaDataKeys as $key) {
            if (!in_array($key, array_keys($data))) {
                $map = Invite::class;
                break;
            }
        }

        return $mapper->map($data, $map);
    }

    public function isType(mixed $data): bool
    {
        return $data instanceof Invite;
    }
}