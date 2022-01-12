<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Helpers\Crypto\SpCrypto;
use Helpers\Crypto\SpEcKeyPair;
use Helpers\Security\DigitalSignature\EccSignatureManager;
use ParagonIE\EasyECC\EasyECC;

/* $list = new SpCrypto();
 print_r($list->GenerateKeyPair());

$prKey = `-----BEGIN EC PRIVATE KEY-----
MHcCAQEEIFpY6HmL9XkGQFpygXyRLkUTMldnN6RpJ5XHbDaJ942joAoGCCqGSM49
AwEHoUQDQgAEQ72zZNQVi56fpJySdeMpdEuv2SkjiPKojaQSEyQwMI0Lz7Ojlzr4
KA0DeDOcBxuu1l/kZHeyrkIzves+vX4rJg==
-----END EC PRIVATE KEY-----`;

$pubKey = `-----BEGIN PUBLIC KEY-----
MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEQ72zZNQVi56fpJySdeMpdEuv2Skj
iPKojaQSEyQwMI0Lz7Ojlzr4KA0DeDOcBxuu1l/kZHeyrkIzves+vX4rJg==
-----END PUBLIC KEY-----`;



 $model = new SpEcKeyPair();
$ecc = new EasyECC('P256');
$privateKey = $ecc->generatePrivateKey();
$publicKey = $privateKey->getPublicKey();

print_r(gettype($ecc->generatePrivateKey()));

$signature = new EccSignatureManager();
$data = 'try to sign message';

$sig = $signature->Sign($data, $privateKey);
print_r($sig);

$ver = $signature->Verify($data, $publicKey, $sig);
print_r($ver); */

$prKey = '-----BEGIN EC PRIVATE KEY-----
MHQCAQEEIFTZon9Gp5j+eWmOA8rJ63Jc80Vn8ij8U3ptUjxxWXp/oAcGBSuBBAAK
oUQDQgAEZX9A5RlQVpK3F3V94py/S8ii8Hkd/VT7CpQt4rrK+had5Gwj+fSWY04J
jnd5Lz9PyLeuYyOzT1NZ5CgRVrO/vA==
-----END EC PRIVATE KEY-----';

$pubKey = '-----BEGIN PUBLIC KEY-----
MFYwEAYHKoZIzj0CAQYFK4EEAAoDQgAEZX9A5RlQVpK3F3V94py/S8ii8Hkd/VT7
CpQt4rrK+had5Gwj+fSWY04Jjnd5Lz9PyLeuYyOzT1NZ5CgRVrO/vA==
-----END PUBLIC KEY-----';

$list = new SpCrypto();
// print_r($list->GenerateKeyPair());

$signature = new EccSignatureManager();
$data = "try to sign message";

$sig = $signature->Sign($data, $prKey);
print_r($sig);

 $ver = $signature->Verify($data, $sig, $pubKey);
//var_dump($ver);
