<?php

namespace SpClient\models;

class SpTestEnvironment
{
    public bool $debugMode;
    public string $baseUrl;
    public string $serverPublicKey;
    public string $apiKey;
    public string $appId;
    public ?SpTestEcKeypair $ecKeypair;
    public ?SpTestProxy $proxy;
}