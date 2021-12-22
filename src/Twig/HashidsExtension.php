<?php

namespace GalDigitalGmbh\HashidsBundle\Twig;

use GalDigitalGmbh\HashidsBundle\Service\HashService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class HashidsExtension extends AbstractExtension
{
    public function __construct(
        private HashService $hashService,
    ) {
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('hashid_encode', [$this->hashService, 'encode']),
            new TwigFilter('hashid_decode', [$this->hashService, 'decode']),
            new TwigFilter('hashid_encode_multiple', [$this->hashService, 'encodeMultiple']),
            new TwigFilter('hashid_decode_multiple', [$this->hashService, 'decodeMultiple']),
        ];
    }
}
