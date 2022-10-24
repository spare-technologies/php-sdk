<?php

namespace Helpers\Crypto;

use phpseclib3\Crypt\EC;

class SpCrypto
{
    /**
     * Generate key pair
     * @return SpEcKeyPair
     */
    public static function GenerateKeyPair(): SpEcKeyPair
    {
        $private = EC::createKey('prime256v1');
        return new SpEcKeyPair($private->toString("PKCS8"), $private->getPublicKey()->toString("PKCS8"));
    }

}