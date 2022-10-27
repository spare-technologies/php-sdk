<?php

namespace SpClient;
require_once __DIR__ . '/../../vendor/autoload.php';

use Exception;
use Faker;
use Helpers\Crypto\SpCrypto;
use Helpers\Security\DigitalSignature\EccSignatureManager;
use Payment\Models\Payment\Domestic\SpCustomerInformation;
use Payment\Models\Payment\Domestic\SpPaymentRequest;
use PHPUnit\Framework\TestCase;

class SpCryptoTest extends TestCase
{
    /**
     * Generate Ec key test
     */
    public function testGenerateEcKeyPair()
    {
        $keys = SpCrypto::GenerateKeyPair();
        $this->assertNotNull($keys);
        $this->assertNotEmpty($keys->getPrivateKey());
        $this->assertNotEmpty($keys->getPublicKey());
        putenv("keys=ali");
    }

    /**
     * Sign and verify object test
     * @throws Exception
     */
    public function testSignAndVerify()
    {
        $faker = Faker\Factory::create();
        $payment = new SpPaymentRequest();
        $payment->setAmount($faker->randomFloat());
        $payment->setDescription($faker->catchPhrase);
        $payment->setOrderId($faker->ean8);

        $customerInfo = new SpCustomerInformation();
        $customerInfo->setEmail($faker->email);
        $customerInfo->setFullname($faker->firstName);
        $customerInfo->setCustomerReferenceId(str_replace("#", '', $faker->hexColor));

        $payment->setCustomerInformation($customerInfo);

        $keys = SpCrypto::GenerateKeyPair();

        $signature = EccSignatureManager::Sign($payment->toJonsString(), $keys->getPrivateKey());

        $this->assertNotEmpty($signature);

        $this->assertTrue(EccSignatureManager::Verify($payment->toJonsString(), $signature, $keys->publicKey));
    }
}
