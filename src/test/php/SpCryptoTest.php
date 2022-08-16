<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Helpers\Crypto\SpCrypto;
use Helpers\Security\DigitalSignature\EccSignatureManager;
use Helpers\Security\DigitalSignature\serializer;
use Payment\Models\Payment\Domestic\SpDomesticPaymentRequest;

class SpCryptoTest extends TestCase {
    /**
     * Generate Ec key test
     */
    public function testGenerateEcKeyPair() {
        try {
            $spCrypto = new SpCrypto();
            $keys = $spCrypto->GenerateKeyPair();
            $this->assertNotNull($keys);
            $this->assertNotEmpty($keys->getPrivateKey());
            $this->assertNotEmpty($keys->getPublicKey());
        } catch (\ParagonIE\EasyECC\Exception\NotImplementedException $e) {
        }
    }

    /**
     * Sign and verify object test
     */
    public function testSignAndVerify() {
        $faker = Faker\Factory::create();
        $payment = new SpDomesticPaymentRequest();
        $payment->setAmount($faker->buildingNumber);
        $payment->setDescription($faker->catchPhrase);
        $payment->setOrderId($faker->ean8);
        $spCrypto = new SpCrypto();
        $keys = $spCrypto->GenerateKeyPair();
        try {
            $signatureManager = new EccSignatureManager();
            $serializer = new serializer();
            $signature = $signatureManager->Sign($serializer->Serialise((array) $payment), $keys->getPrivateKey());
            $this->assertNotEmpty($signature);
            $verify = $signatureManager->Verify($serializer->Serialise((array) $payment), $signature, $keys->getPublicKey());
            $this->assertTrue($verify);
            $falseVerify = $signatureManager->Verify('aaaa', $signature, $keys->getPublicKey());
            $this->assertFalse($falseVerify);
        } catch (\ParagonIE\EasyECC\Exception\NotImplementedException $e){
        }
    }
}
