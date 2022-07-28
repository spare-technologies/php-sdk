<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Helpers\Crypto\SpCrypto;

$client = new \Payment\Client\SpPaymentClient(
    new \Payment\Client\SpPaymentClientOptions('https://payment.dev.tryspare.com',
        'uydh6g0gfqvKhcxcVGAWS2V+T+h/8simgnbMFrj/tOw=',
        '9LsJP+tpqhdEQQAs4wJ5EQZKLGeydf9RBt3xsJUs6GI=')
);
/* try {
    $rep = $client->GetDomesticPayment('6383ee82-48f4-4e4f-b254-634467789c94');
    print_r($rep);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
} */


/* try {
    $rep = $client->GetDomesticPayment('77323989-34f0-48c1-879f-dbb516bb7ea2');
    print_r($rep);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
} */


/* try {
    $list = $client->ListDomesticPayment(0, 10);
    print_r($list);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
}  */

 $serKey = "-----BEGIN PUBLIC KEY-----
MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEZergpIl9cU89g/iV97ZLPSyPc7S3
Z5l3yXTuHXDTOnFwhHr/Pep8UFOl26Gbjxf0I84MjJFsqNsmUSfjdZTr7Q==
-----END PUBLIC KEY-----";

$payment = new \Payment\Models\Payment\Domestic\SpDomesticPaymentRequest();
$payment->setAmount(50);
 $payment->setDescription('Test payment');
$payment->setOrderId('12345');
$debtor = new \Payment\Models\Payment\Domestic\SpPaymentDebtorInformation('Jack Smith', 'user@test.com', '55789456', '56789');
// $payment->setCustomerInformation($debtor);

print_r(json_encode($payment));

$rep = $client->CreateDomesticPayment($payment, 'MEYCIQCTw+o6EoN6XyNMezN9GkVa4zREJ7gBCj9WofTrMbJS6AIhANM9wRYn6kCZt/sLXKko3tAtuqN8kk3e2im+sCeApkW/');
print_r($rep->getPayment());

$signature = new \Helpers\Security\DigitalSignature\EccSignatureManager();
$ser = new \Helpers\Security\DigitalSignature\serializer();
$data = $ser->Serialise($rep->getPayment());

$ver = $signature->Verify($data, $rep->getSignature(), $serKey);
var_dump($ver);

