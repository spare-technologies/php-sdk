<?php

namespace Helpers\Crypto;

use ParagonIE\EasyECC\EasyECC;
use ParagonIE\EasyECC\ECDSA\{PublicKey, SecretKey};

use EllipticCurve\PrivateKey;

class SpCrypto
{
    /**
     * @throws \ParagonIE\EasyECC\Exception\NotImplementedException
     * @throws \SodiumException
     */
    function GenerateKeyPair(): SpEcKeyPair {
        $model = new SpEcKeyPair();
        $prKey = new PrivateKey("secp256k1");
        $pbKey = $prKey->publicKey();
     //   $privateKey = $ecc->generatePrivateKey();
     //   $publicKey = $privateKey->getPublicKey();
        $model->setPrivateKey($prKey->toPem());
        $model->setPublicKey($pbKey->toPem());
        return $model;
    }

}