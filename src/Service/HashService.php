<?php

namespace GalDigitalGmbh\HashidsBundle\Service;

use Hashids\Hashids;

class HashService
{
    public function __construct(
        private Hashids $hashids,
    ) {
    }

    public function encode(int $id): string
    {
        return $this->hashids->encode($id);
    }

    /**
     * @param int[] $ids
     */
    public function encodeMultiple(array $ids): string
    {
        return $this->hashids->encode(...$ids);
    }

    public function decode(string $hash): ?int
    {
        $result = $this->hashids->decode($hash);

        if (empty($result)) {
            return null;
        }

        return (int) $result[0];
    }

    /**
     * @return int[]
     */
    public function decodeMultiple(string $hash): array
    {
        return $this->hashids->decode($hash);
    }
}
