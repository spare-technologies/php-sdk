<?php

namespace Helpers\Security\DigitalSignature;


use Exception;
use phpseclib3\Crypt\EC;

class EccSignatureManager
{
    /**
     * Sign string
     * @param string $data
     * @param string $privateKey
     * @return string
     * @throws Exception
     */
    public static function Sign(string $data, string $privateKey): string
    {
        $key = EC::load($privateKey);
        if ($key instanceof EC\PrivateKey) {
            return base64_encode($key->sign($data));
        } else {
            throw new Exception('Invalid private key');
        }
    }

    /**
     * Verify string signature
     * @param string $data
     * @param string $signature
     * @param $publicKey
     * @return bool
     * @throws Exception
     */
    public static function Verify(string $data, string $signature, $publicKey): bool
    {
        $key = EC::load($publicKey);
        $key->withHash("sha256");
        if ($key instanceof EC\PublicKey) {
            return $key->verify($data, base64_decode($signature));
        } else {
            throw new Exception('Invalid public key');
        }
    }
}