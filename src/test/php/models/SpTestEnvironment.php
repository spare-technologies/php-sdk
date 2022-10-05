<?php

namespace test\php\models;

use Helpers\Crypto\SpEcKeyPair;

class SpTestEnvironment
{
    public bool $debugMode;
    public string $baseUrl;
    public string $serverPublicKey;
    public string $apiKey;
    public string $appId;
    public ?SpTestEcKeypair $ecKeypair;
    //public ?SpTestProxy $proxy;
}