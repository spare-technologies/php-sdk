<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Helpers\Crypto\SpCrypto;
use Helpers\Security\DigitalSignature\EccSignatureManager;
use Helpers\Security\DigitalSignature\serializer;

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
        $data = array('orderId' => '12345', 'amount' => 50, 'description' => 'Test payment');
        $spCrypto = new SpCrypto();
        $keys = $spCrypto->GenerateKeyPair();
        try {
            $signatureManager = new EccSignatureManager();
            $serializer = new serializer();
            $signature = $signatureManager->Sign($serializer->Serialise($data), $keys->getPrivateKey());
            $this->assertNotEmpty($signature);
            $verify = $signatureManager->Verify($serializer->Serialise($data), $signature, $keys->getPublicKey());
            $this->assertTrue($verify);
            $falseVerify = $signatureManager->Verify('aaaa', $signature, $keys->getPublicKey());
            $this->assertFalse($falseVerify);
        } catch (\ParagonIE\EasyECC\Exception\NotImplementedException $e){
        }
    }
}
