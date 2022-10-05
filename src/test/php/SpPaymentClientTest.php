<?php

namespace test\php;
require_once __DIR__ . '/../../../vendor/autoload.php';

use Faker;
use GuzzleHttp\Exception\GuzzleException;
use Helpers\Security\DigitalSignature\EccSignatureManager;
use Helpers\Serialization\SpSerializer;
use Payment\Client\SpPaymentClient;
use Payment\Client\SpPaymentClientOptions;
use Payment\Client\SpPaymentSdkException;
use Payment\Models\Payment\Domestic\SpCustomerInformation;
use Payment\Models\Payment\Domestic\SpPaymentRequest;
use Payment\Models\Payment\Domestic\SpPaymentResponse;
use PHPUnit\Framework\TestCase;
use test\php\models\SpTestEnvironment;

class SpPaymentClientTest extends TestCase
{
    private SpPaymentClient $paymentClient;
    private SpTestEnvironment $testEnvironment;

    protected function setUp(): void
    {
        $this->LoadTestEnvironment();

        $this->paymentClient = new SpPaymentClient(
            new SpPaymentClientOptions($this->testEnvironment->baseUrl,
                $this->testEnvironment->appId,
                $this->testEnvironment->apiKey)
        );
    }

    /**
     * Create domestic payment test
     * @throws GuzzleException
     * @throws SpPaymentSdkException
     */
    public function testCreateDomesticPayment()
    {
        $faker = Faker\Factory::create();
        $paymentRequest = new SpPaymentRequest();
        $paymentRequest->setAmount($faker->randomFloat());
        $paymentRequest->setDescription($faker->catchPhrase);
        $paymentRequest->setOrderId($faker->ean8);

        $signature = EccSignatureManager::Sign($paymentRequest->toJonsString(), $this->testEnvironment->ecKeypair->getPrivateKey());

        $this->assertNotEmpty($signature);

        $paymentResponse = $this->paymentClient->CreateDomesticPayment($paymentRequest, $signature);

        $this->assertNotNull($paymentResponse);

        $this->assertNotEmpty($paymentResponse->getSignature());

        $this->assertNotNull($paymentResponse->getPayment()->getId());
        $this->assertNotEmpty($paymentResponse->getPayment()->getId());

        $this->assertNotNull($paymentResponse->getPayment()->getAmount());
        $this->assertNotEmpty($paymentResponse->getPayment()->getAmount());

        $this->assertNotNull($paymentResponse->getPayment()->getCurrency());
        $this->assertNotEmpty($paymentResponse->getPayment()->getCurrency());

        $this->assertNotNull($paymentResponse->getPayment()->getIssuedFrom());
        $this->assertNotEmpty($paymentResponse->getPayment()->getIssuedFrom());

        $this->assertNotNull($paymentResponse->getPayment()->getReference());
        $this->assertNotEmpty($paymentResponse->getPayment()->getReference());

        $this->assertNotNull($paymentResponse->getPayment()->getOrderId());
        $this->assertNotEmpty($paymentResponse->getPayment()->getOrderId());

        $this->assertNotNull($paymentResponse->getPayment()->getCreatedAt());
        $this->assertNotEmpty($paymentResponse->getPayment()->getCreatedAt());

        $this->assertNotNull($paymentResponse->getPayment()->getLink());
        $this->assertNotEmpty($paymentResponse->getPayment()->getLink());

        $this->assertNotNull($paymentResponse->getPayment()->getDescription());
        $this->assertNotEmpty($paymentResponse->getPayment()->getDescription());

        putenv("paymentId={$paymentResponse->getPayment()->getId()}");

    }

    /**
     * Create domestic payment with customer information
     * @throws GuzzleException
     * @throws SpPaymentSdkException
     */
    public function testCreateDomesticPaymentWithCustomerInformation()
    {
        $faker = Faker\Factory::create();
        $paymentRequest = new SpPaymentRequest();
        $paymentRequest->setAmount($faker->randomFloat());
        $paymentRequest->setDescription($faker->catchPhrase);
        $paymentRequest->setOrderId($faker->ean8);

        $customerInfo = new SpCustomerInformation();
        $customerInfo->setCustomerReferenceId($faker->ean13);
        $customerInfo->setFullname($faker->name);
        $customerInfo->setEmail($faker->email);

        $paymentRequest->setCustomerInformation($customerInfo);


        $signature = EccSignatureManager::Sign($paymentRequest->toJonsString(), $this->testEnvironment->ecKeypair->getPrivateKey());

        $this->assertNotEmpty($signature);

        $paymentResponse = $this->paymentClient->CreateDomesticPayment($paymentRequest, $signature);

        $this->assertNotNull($paymentResponse);

        $this->assertNotEmpty($paymentResponse->getSignature());

        $this->assertNotNull($paymentResponse->getPayment()->getId());
        $this->assertNotEmpty($paymentResponse->getPayment()->getId());

        $this->assertNotNull($paymentResponse->getPayment()->getAmount());
        $this->assertNotEmpty($paymentResponse->getPayment()->getAmount());

        $this->assertNotNull($paymentResponse->getPayment()->getCurrency());
        $this->assertNotEmpty($paymentResponse->getPayment()->getCurrency());

        $this->assertNotNull($paymentResponse->getPayment()->getIssuedFrom());
        $this->assertNotEmpty($paymentResponse->getPayment()->getIssuedFrom());

        $this->assertNotNull($paymentResponse->getPayment()->getReference());
        $this->assertNotEmpty($paymentResponse->getPayment()->getReference());

        $this->assertNotNull($paymentResponse->getPayment()->getOrderId());
        $this->assertNotEmpty($paymentResponse->getPayment()->getOrderId());

        $this->assertNotNull($paymentResponse->getPayment()->getCreatedAt());
        $this->assertNotEmpty($paymentResponse->getPayment()->getCreatedAt());

        $this->assertNotNull($paymentResponse->getPayment()->getLink());
        $this->assertNotEmpty($paymentResponse->getPayment()->getLink());

        $this->assertNotNull($paymentResponse->getPayment()->getDescription());
        $this->assertNotEmpty($paymentResponse->getPayment()->getDescription());

        $this->assertNotNull($paymentResponse->getPayment()->debtor->getAccount());

        $this->assertNotNull($paymentResponse->getPayment()->debtor->getAccount()->getId());
        $this->assertNotEmpty($paymentResponse->getPayment()->debtor->getAccount()->getId());

        $this->assertNotNull($paymentResponse->getPayment()->debtor->getAccount()->getFullname());
        $this->assertNotEmpty($paymentResponse->getPayment()->debtor->getAccount()->getFullname());

        $this->assertNotNull($paymentResponse->getPayment()->debtor->getAccount()->getCustomerReferenceId());
        $this->assertNotEmpty($paymentResponse->getPayment()->debtor->getAccount()->getCustomerReferenceId());

        putenv("paymentId={$paymentResponse->getPayment()->getId()}");
    }

    /**
     * Get domestic payment test
     * @throws GuzzleException
     * @throws SpPaymentSdkException
     */
    public function testGetDomesticPayment()
    {
        $paymentId = getenv('paymentId');

        $this->assertNotEmpty($paymentId);

        $paymentResponse = $this->paymentClient->GetDomesticPayment($paymentId);

        $this->assertNotNull($paymentResponse);

        $this->assertNotNull($paymentResponse->getId());
        $this->assertNotEmpty($paymentResponse->getId());

        $this->assertNotNull($paymentResponse->getAmount());
        $this->assertNotEmpty($paymentResponse->getAmount());

        $this->assertNotNull($paymentResponse->getCurrency());
        $this->assertNotEmpty($paymentResponse->getCurrency());

        $this->assertNotNull($paymentResponse->getIssuedFrom());
        $this->assertNotEmpty($paymentResponse->getIssuedFrom());

        $this->assertNotNull($paymentResponse->getReference());
        $this->assertNotEmpty($paymentResponse->getReference());

        $this->assertNotNull($paymentResponse->getOrderId());
        $this->assertNotEmpty($paymentResponse->getOrderId());

        $this->assertNotNull($paymentResponse->getCreatedAt());
        $this->assertNotEmpty($paymentResponse->getCreatedAt());

        $this->assertNotNull($paymentResponse->getLink());
        $this->assertNotEmpty($paymentResponse->getLink());

        $this->assertNotNull($paymentResponse->getDescription());
        $this->assertNotEmpty($paymentResponse->getDescription());
    }

    /**
     * List domestic payment test
     * @throws GuzzleException
     * @throws SpPaymentSdkException
     */
    public function testListDomesticPayments()
    {
        $rep = $this->paymentClient->ListDomesticPayment(0, 100);

        $this->assertNotNull($rep);

        foreach ($rep as $paymentResponse) {
            $this->assertNotNull($paymentResponse);
        }

    }

    private function LoadTestEnvironment(): void
    {
        $jsonTestEnvironment = file_get_contents('../resources/testEnvironment.json');
        $this->testEnvironment = SpSerializer::getDeserializer()->deserialize($jsonTestEnvironment, SpTestEnvironment::class, 'json');

        $this->assertNotNull($this->testEnvironment);
        $this->assertNotEmpty($this->testEnvironment->apiKey);
        $this->assertNotEmpty($this->testEnvironment->appId);
        $this->assertNotEmpty($this->testEnvironment->baseUrl);
        $this->assertNotEmpty($this->testEnvironment->serverPublicKey);
        $this->assertNotNull($this->testEnvironment->ecKeypair);
        $this->assertNotEmpty($this->testEnvironment->ecKeypair->publicKey);
        $this->assertNotEmpty($this->testEnvironment->ecKeypair->publicKey);
    }
}
