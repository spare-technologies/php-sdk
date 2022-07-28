<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Payment\Client\SpPaymentClient;
use Payment\Client\SpPaymentClientOptions;
use Payment\Models\Payment\Domestic\SpDomesticPaymentRequest;
use Helpers\Security\DigitalSignature\serializer;
use Helpers\Security\DigitalSignature\EccSignatureManager;


class SpPaymentClientTest extends TestCase {
    private SpPaymentClient $paymentClient;
    private string $prKey;
    private string $pubKey;

    protected function setUp(): void
    {
        $this->prKey = '-----BEGIN PRIVATE KEY-----
MIGHAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBG0wawIBAQQgpIs8tj7kiNV6A8+j
V7+7gWp/IfY2wJpwjxTU6FvzEk+hRANCAARpJ80jUMvH4V1Os77NGdZ3HEBMd9jg
wwooy5l/h2MEuL8a18URu3HpLBV95/GA8LhmobcTOPAF9FrEx8UPqSpH
-----END PRIVATE KEY-----';

        $this->pubKey = '-----BEGIN PUBLIC KEY-----
MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEaSfNI1DLx+FdTrO+zRnWdxxATHfY
4MMKKMuZf4djBLi/GtfFEbtx6SwVfefxgPC4ZqG3EzjwBfRaxMfFD6kqRw==
-----END PUBLIC KEY-----';

        $this->paymentClient = new SpPaymentClient(
            new SpPaymentClientOptions('https://payment.dev.tryspare.com',
                'uydh6g0gfqvKhcxcVGAWS2V+T+h/8simgnbMFrj/tOw=',
                '9LsJP+tpqhdEQQAs4wJ5EQZKLGeydf9RBt3xsJUs6GI=')
        );
    }

    /**
     * Create domestic payment test
     */
    public function testCreateDomesticPayment() {

        $payment = new SpDomesticPaymentRequest();
        $payment->setAmount(50);
        $payment->setDescription('Test payment');
        $payment->setOrderId('12345');

        $signature = new EccSignatureManager();
        $serializer = new serializer();
        $data = $serializer->Serialise(array('orderId' => '12345', 'amount' => 50, 'description' => 'Test payment'));
        $sign = $signature->Sign($data, $this->prKey);

        $rep = $this->paymentClient->CreateDomesticPayment($payment, $sign);
        $this->assertNotNull($rep);
        $this->assertTrue($signature->Verify($data, $sign, $this->pubKey));

        $this->assertNotNull($rep->getPayment()['id']);
        $this->assertNotEmpty($rep->getPayment()['id']);

        $this->assertNotNull($rep->getPayment()['amount']);
        $this->assertNotEmpty($rep->getPayment()['amount']);

        $this->assertNotNull($rep->getPayment()['currency']);
        $this->assertNotEmpty($rep->getPayment()['currency']);

        $this->assertNotNull($rep->getPayment()['issuedFrom']);
        $this->assertNotEmpty($rep->getPayment()['issuedFrom']);

        $this->assertNotNull($rep->getPayment()['reference']);
        $this->assertNotEmpty($rep->getPayment()['reference']);

        $this->assertNotNull($rep->getPayment()['orderId']);
        $this->assertNotEmpty($rep->getPayment()['orderId']);

        $this->assertNotNull($rep->getPayment()['createdAt']);
        $this->assertNotEmpty($rep->getPayment()['createdAt']);

        $this->assertNotNull($rep->getPayment()['link']);
        $this->assertNotEmpty($rep->getPayment()['link']);

        $this->assertNotNull($rep->getPayment()['description']);
        $this->assertNotEmpty($rep->getPayment()['description']);
    }

    /**
     * Get domestic payment test
     */
    public function testGetDomesticPayment() {
        $rep = $this->paymentClient->GetDomesticPayment('34220fe8-8935-4779-8e1c-bba5e2282eac');

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
}
