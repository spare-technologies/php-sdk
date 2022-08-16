<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use Payment\Models\Response\SpareSdkResponse;
use PHPUnit\Framework\TestCase;
use Payment\Client\SpPaymentClient;
use Payment\Client\SpPaymentClientOptions;
use Payment\Models\Payment\Domestic\SpDomesticPaymentRequest;
use Helpers\Security\DigitalSignature\serializer;
use Helpers\Security\DigitalSignature\EccSignatureManager;
use test\php\models\SpTestEnvironment;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class SpPaymentClientTest extends TestCase {
    private SpPaymentClient $paymentClient;
    private SpTestEnvironment $testEnvironment;

    protected function setUp(): void
    {
        $this->LoadTestEnvironment();

        $this->paymentClient = new SpPaymentClient(
            new SpPaymentClientOptions($this->testEnvironment->getBaseUrl(),
                $this->testEnvironment->getAppId(),
                $this->testEnvironment->getApiKey())
        );
    }

    /**
     * Create domestic payment test
     */
    public function testCreateDomesticPayment() {
        $faker = Faker\Factory::create();
        $paymentRequest = new SpDomesticPaymentRequest();
        $paymentRequest->setAmount($faker->buildingNumber);
        $paymentRequest->setDescription($faker->catchPhrase);
        $paymentRequest->setOrderId($faker->ean8);

        $signature = new EccSignatureManager();
        $serializer = new serializer();

        $paymentResponse = $this->paymentClient->CreateDomesticPayment($paymentRequest,
            $signature->Sign($serializer->Serialise((array) $paymentRequest), $this->testEnvironment->getEcKeypair()['private']));

        putenv("paymentId={$paymentResponse->getPayment()['id']}");

        $this->assertNotNull($paymentResponse);

        $this->assertTrue($signature->Verify($serializer->Serialise($paymentResponse->getPayment()), $paymentResponse->getSignature(),
            $this->testEnvironment->getServerPublicKey()));

        $this->assertNotNull($paymentResponse->getPayment()['id']);
        $this->assertNotEmpty($paymentResponse->getPayment()['id']);

        $this->assertNotNull($paymentResponse->getPayment()['amount']);
        $this->assertNotEmpty($paymentResponse->getPayment()['amount']);
        $this->assertEquals($paymentResponse->getPayment()['amount'], $paymentRequest->getAmount());

        $this->assertNotNull($paymentResponse->getPayment()['currency']);
        $this->assertNotEmpty($paymentResponse->getPayment()['currency']);

        $this->assertNotNull($paymentResponse->getPayment()['issuedFrom']);
        $this->assertNotEmpty($paymentResponse->getPayment()['issuedFrom']);

        $this->assertNotNull($paymentResponse->getPayment()['reference']);
        $this->assertNotEmpty($paymentResponse->getPayment()['reference']);

        $this->assertNotNull($paymentResponse->getPayment()['orderId']);
        $this->assertNotEmpty($paymentResponse->getPayment()['orderId']);

        $this->assertNotNull($paymentResponse->getPayment()['createdAt']);
        $this->assertNotEmpty($paymentResponse->getPayment()['createdAt']);

        $this->assertNotNull($paymentResponse->getPayment()['link']);
        $this->assertNotEmpty($paymentResponse->getPayment()['link']);

        $this->assertNotNull($paymentResponse->getPayment()['description']);
        $this->assertNotEmpty($paymentResponse->getPayment()['description']);

    
    }

    /**
     * Create domestic payment with customer information
     */

    public function testCreateDomesticPaymentWithCustomerInformation() {
        $faker = Faker\Factory::create();
        $paymentRequest = new SpDomesticPaymentRequest();
        $paymentRequest->setAmount($faker->buildingNumber);
        $paymentRequest->setDescription($faker->catchPhrase);
        $paymentRequest->setOrderId($faker->ean8);

        $debtor = (array) new \Payment\Models\Payment\Domestic\SpPaymentDebtorInformation(
            $faker->name, $faker->email, $faker->e164PhoneNumber, $faker->ean8);
        $paymentRequest->setCustomerInformation($debtor);


        $signature = new EccSignatureManager();
        $serializer = new serializer();

        $paymentResponse = $this->paymentClient->CreateDomesticPayment($paymentRequest,
            $signature->Sign($serializer->Serialise((array) $paymentRequest), $this->testEnvironment->getEcKeypair()['private']));

        putenv("paymentId={$paymentResponse->getPayment()['id']}");

        $this->assertNotNull($paymentResponse);

        $this->assertTrue($signature->Verify($serializer->Serialise($paymentResponse->getPayment()), $paymentResponse->getSignature(),
            $this->testEnvironment->getServerPublicKey()));

        $this->assertNotNull($paymentResponse->getPayment()['id']);
        $this->assertNotEmpty($paymentResponse->getPayment()['id']);

        $this->assertNotNull($paymentResponse->getPayment()['amount']);
        $this->assertNotEmpty($paymentResponse->getPayment()['amount']);
        $this->assertEquals($paymentResponse->getPayment()['amount'], $paymentRequest->getAmount());

        $this->assertNotNull($paymentResponse->getPayment()['currency']);
        $this->assertNotEmpty($paymentResponse->getPayment()['currency']);

        $this->assertNotNull($paymentResponse->getPayment()['issuedFrom']);
        $this->assertNotEmpty($paymentResponse->getPayment()['issuedFrom']);

        $this->assertNotNull($paymentResponse->getPayment()['reference']);
        $this->assertNotEmpty($paymentResponse->getPayment()['reference']);

        $this->assertNotNull($paymentResponse->getPayment()['orderId']);
        $this->assertNotEmpty($paymentResponse->getPayment()['orderId']);

        $this->assertNotNull($paymentResponse->getPayment()['createdAt']);
        $this->assertNotEmpty($paymentResponse->getPayment()['createdAt']);

        $this->assertNotNull($paymentResponse->getPayment()['link']);
        $this->assertNotEmpty($paymentResponse->getPayment()['link']);

        $this->assertNotNull($paymentResponse->getPayment()['description']);
        $this->assertNotEmpty($paymentResponse->getPayment()['description']);

        $this->assertNotNull($paymentResponse->getPayment()['debtor']['account']);
        $this->assertNotEmpty($paymentResponse->getPayment()['debtor']['account']);

        $this->assertNotNull($paymentResponse->getPayment()['debtor']['account']['id']);
        $this->assertNotEmpty($paymentResponse->getPayment()['debtor']['account']['id']);

        $this->assertNotNull($paymentResponse->getPayment()['debtor']['account']['fullname']);
        $this->assertNotEmpty($paymentResponse->getPayment()['debtor']['account']['fullname']);

        $this->assertNotNull($paymentResponse->getPayment()['debtor']['account']['phone']);
        $this->assertNotEmpty($paymentResponse->getPayment()['debtor']['account']['phone']);

        $this->assertNotNull($paymentResponse->getPayment()['debtor']['account']['customerReferenceId']);
        $this->assertNotEmpty($paymentResponse->getPayment()['debtor']['account']['customerReferenceId']);
    }

    /**
     * Get domestic payment test
     */
    public function testGetDomesticPayment() {
        $paymentId = getenv('paymentId');
        $rep = $this->paymentClient->GetDomesticPayment($paymentId);

        $this->assertNotNull($rep);
        $this->assertNotEmpty($rep);

        $this->assertNotNull($rep['reference']);
        $this->assertNotEmpty($rep['reference']);
    }

    /**
     * List domestic payment test
     */
    public function testListDomesticPayments() {
        $rep = $this->paymentClient->ListDomesticPayment(0, 100);

        $this->assertNotNull($rep);

        foreach ($rep as $value) {
            $this->assertNotNull($value);
            $this->assertNotNull($value['reference']);
        }
    }

    public function GetSerializer(): Serializer
    {
        return new Serializer([new JsonEncoder()], [new ObjectNormalizer()]);
    }

    private function LoadTestEnvironment(): void {
        $serializer = new serializer();
        $jsonTestEnvironment = file_get_contents('testEnvironment.json');
        $this->testEnvironment = $serializer->GetSerializer()->deserialize($jsonTestEnvironment, SpTestEnvironment::class, 'json');

        $this->assertNotNull($this->testEnvironment);
        $this->assertNotNull($this->testEnvironment->getEcKeypair());
        $this->assertNotNull($this->testEnvironment->getApiKey());
        $this->assertNotNull($this->testEnvironment->getAppId());
        $this->assertNotNull($this->testEnvironment->getBaseUrl());
        $this->assertNotNull($this->testEnvironment->getProxy());
    }
}
