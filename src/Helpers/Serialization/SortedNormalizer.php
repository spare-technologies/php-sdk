<?php

namespace Helpers\Serialization;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SortedNormalizer implements NormalizerInterface
{
    public function normalize($object, $format = null, array $context = []): array
    {
        return $this->toArray($object);
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return true;
    }

    /**
     * Convert object to array
     * @param $value
     * @return array
     */
    private function toArray($value): array
    {
        if (is_array($value)) {
            $arr = $this->applyContract($value);
        } else {
            $arr = (array)json_decode(json_encode($value));
            $arr = $this->applyContract($arr);
        }
        return $arr;
    }

    /**
     * Apply serialization contract
     * @param array $arr
     * @return array
     */
    private function applyContract(array $arr): array
    {
        if ($this->is_associative_array($arr)) {
            foreach ($arr as $key => $v) {
                if ($v == null) {
                    unset($arr[$key]);
                }
                if (is_object($v)) {
                    $arr[$key] = $this->toArray($v);
                }
                if (is_double($v)) {
                    $arr[$key] = strval(round($v, 5));
                }
                if (is_int($v)) {
                    $arr[$key] = strval($v);
                }
            }
            ksort($arr, SORT_STRING);
            return $arr;
        } else {
            $filtered = array();
            for ($i = 0; $i <= count($arr) - 1; $i++) {
                if ($arr[$i] == null) {
                    continue;
                }
                if (is_object($arr[$i])) {
                    $filtered[] = $this->toArray($arr[$i]);
                }
                if (is_double($arr[$i])) {
                    $filtered[] = strval(round($arr[$i], 5));
                }
                if (is_int($arr[$i])) {
                    $filtered[] = strval($arr[$i]);
                }

            }
            return $filtered;
        }
    }

    /**
     * Check if array is associative
     * @param $arr
     * @return bool
     */
    private function is_associative_array($arr): bool
    {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}