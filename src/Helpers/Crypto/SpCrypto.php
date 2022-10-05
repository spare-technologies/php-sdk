<?php

namespace Helpers\Crypto;

use EllipticCurve\PrivateKey;

class SpCrypto
{
    /**
     * Generate key pair
     * @return SpEcKeyPair
     */
    public static function GenerateKeyPair(): SpEcKeyPair
    {
        $prKey = new PrivateKey("secp256k1");
        $pbKey = $prKey->publicKey();
        return new SpEcKeyPair($prKey->toPem(), $pbKey->toPem());
    }

}