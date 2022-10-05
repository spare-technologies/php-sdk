<?php

namespace Payment\Models;

use Helpers\Serialization\SortedNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

class SpBaseModel
{
    /**
     * Get json string
     * @return string
     */
    public function toJonsString(): string
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new SortedNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        return $serializer->serialize($this, 'json');
    }
}