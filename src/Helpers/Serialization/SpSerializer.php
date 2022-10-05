<?php

namespace Helpers\Serialization;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SpSerializer
{
    /**
     * Get json string
     * @param $object
     * @return string
     */
    public static function toJonsString($object): string
    {
        if (is_array($object) && count($object) <= 0) {
            return "[]";
        }

        $json = SpSerializer::getSerializer()->serialize($object, 'json');

        if ($json == "[]") {
            return "{}";
        }

        return $json;
    }

    /**
     * Get object serializer
     * @return Serializer
     */
    public static function getSerializer(): Serializer
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new SortedNormalizer()];
        return new Serializer($normalizers, $encoders);
    }

    /**
     * Get object serializer
     * @return Serializer
     */
    public static function getDeserializer(): Serializer
    {
        $encoder = [new JsonEncoder()];
        $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);
        $normalizer = [new ArrayDenormalizer(), new ObjectNormalizer(null, null, null, $extractor)];
        return new Serializer($normalizer, $encoder);
    }
}