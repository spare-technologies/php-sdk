<?php

namespace Helpers\Serialization;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class Serializer
{
    public function Serialise(array $payment): string
    {
        ksort($payment);
        return $this->json_encode(array_filter($payment));
    }

    private function json_encode($value): string
    {
        $result = array();
        foreach ($value as $key => $v) {
            if (is_array($v)) {
                foreach ($v as $k_sec => $v_sec) {
                    if (is_array($v_sec)) {
                        ksort($v_sec);
                        $v[$k_sec] = $v_sec;
                    }
                }
                ksort($v);
                $result[] = '"' . $key . '"' . ':' . json_encode($v);

            } else {
                $result[] = '"' . $key . '"' . ':' . '"' . strval($v) . '"';
            }

        }
        return '{' . implode(',', $result) . '}';
    }

    function GetSerializer(): \Symfony\Component\Serializer\Serializer
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        return new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
    }

    function toArray(mixed $value): array
    {
        $arr = (array)$value;
        foreach ($arr as $key => $v) {
            if (is_object($v)) {
                $arr[$key] = (array)$v;
            }
        }
        return $arr;
    }
}