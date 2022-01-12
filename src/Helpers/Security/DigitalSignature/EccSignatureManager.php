<?php

namespace Helpers\Security\DigitalSignature;

use EllipticCurve\Signature;
use ParagonIE\EasyECC\EasyECC;

use EllipticCurve\Ecdsa;
use EllipticCurve\PrivateKey;
use EllipticCurve\PublicKey;

class EccSignatureManager
{

 /*   function Sign(string $data, string $privateKey): string
    {
     //   $ecc = new EasyECC('P256');
          $ecc = new Ecdsa();
        $signature = null;
        openssl_sign($data, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        $value = new Signature($signature);
        return $value->toBase64();
    }

    function Verify(string $data, string $publicKey, string $signature): bool
    {
      //  $ecc = new EasyECC('P256');
        $ecc = new Ecdsa();

        $success = openssl_verify($data, $signature, $publicKey, OPENSSL_ALGO_SHA256);
        if ($success == 1) {
            return true;
        }
        return false;
    }  */

    function Sign(string $data, string $privateKey): string
    {
        $ecc = new Ecdsa();
        $key = new PrivateKey();
        $PrivateKey = $key::fromPem($privateKey);
        $signature = $ecc::sign($data, $PrivateKey);
        return $signature->toBase64();
    }

    function Verify($data, $signature, $publicKey) {
        $ecc = new Ecdsa();
        $key = new PublicKey($publicKey);
        $PublicKey = $key::fromPem($publicKey);
        $success = openssl_verify($data, $signature, $PublicKey->openSslPublicKey, OPENSSL_ALGO_SHA256);
        if ($success == 1) {
            return true;
        }
        return false;
    }

}