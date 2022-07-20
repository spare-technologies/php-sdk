<?php

require_once __DIR__ . '/../vendor/autoload.php';

use EllipticCurve\Ecdsa;
use EllipticCurve\PrivateKey;
use Helpers\Crypto\SpCrypto;
use Helpers\Crypto\SpEcKeyPair;
use Helpers\Security\DigitalSignature\EccSignatureManager;
use ParagonIE\EasyECC\EasyECC;
use EllipticCurve\PublicKey;
use Helpers\Security\DigitalSignature\serializer;

$prKey = '-----BEGIN PRIVATE KEY-----
MIGHAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBG0wawIBAQQgpIs8tj7kiNV6A8+j
V7+7gWp/IfY2wJpwjxTU6FvzEk+hRANCAARpJ80jUMvH4V1Os77NGdZ3HEBMd9jg
wwooy5l/h2MEuL8a18URu3HpLBV95/GA8LhmobcTOPAF9FrEx8UPqSpH
-----END PRIVATE KEY-----';

$pubKey = '-----BEGIN PUBLIC KEY-----
MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEaSfNI1DLx+FdTrO+zRnWdxxATHfY
4MMKKMuZf4djBLi/GtfFEbtx6SwVfefxgPC4ZqG3EzjwBfRaxMfFD6kqRw==
-----END PUBLIC KEY-----';

 $list = new SpCrypto();
 print_r($list->GenerateKeyPair());

 $signature = new EccSignatureManager();
 $serializer = new serializer();
 $data = $serializer->Serialise(array('amount' => 50.55, 'description' => 'Test payment'));

print_r($data);
$sig = $signature->Sign($data, $prKey);
print_r($sig);

 $ver = $signature->Verify($data, $sig, $pubKey);
var_dump($ver);