<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Helpers\Crypto\SpCrypto;
use Helpers\Security\DigitalSignature\EccSignatureManager;
use Helpers\Security\DigitalSignature\serializer;

$client = new \Payment\Client\SpPaymentClient(
    new \Payment\Client\SpPaymentClientOptions('https://payment.dev.tryspare.com',
        'W/o0fOp30j/Vdubl/juBF36tcYGFrNdnAFrei45hctk=',
        'Dj6+izP5xr/vWuXYQj2Vx9KXwT67Jy2Yj0LXzwoTYuI=')
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

$prKey = '-----BEGIN PRIVATE KEY-----
MIGHAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBG0wawIBAQQg+FCCClPqg4Swqr+G
4nOGwbRQLcFXl93WY1Fl2P5oSrmhRANCAARERX4e7DMSB2RJ+hBIajuwAMeSMC97
PicxGFNLMRheAEi9LyOmn+fZ1E129idndTbVZJxD6I9/LETiq5p/CHaz
-----END PRIVATE KEY-----';

 $serKey = "-----BEGIN PUBLIC KEY-----
MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEZergpIl9cU89g/iV97ZLPSyPc7S3
Z5l3yXTuHXDTOnFwhHr/Pep8UFOl26Gbjxf0I84MjJFsqNsmUSfjdZTr7Q==
-----END PUBLIC KEY-----";
$signature = new EccSignatureManager();
$serializer = new serializer();


$payment = new \Payment\Models\Payment\Domestic\SpDomesticPaymentRequest();
 $payment->setAmount(50);
 $payment->setDescription('Test payment');
 $payment->setOrderId('12345');
$debtor = new \Payment\Models\Payment\Domestic\SpPaymentDebtorInformation('Jack Smith', 'example@example.com', '00216557898', '56789');
 $payment->setCustomerInformation($debtor);


 $datta = $serializer->Serialise($serializer->toArray($payment));

//print_r(json_encode($payment));
//print_r("---------------------------------------------------");
//print_r($serializer->toArray($payment));
print_r($datta);

 $rep = $client->CreateDomesticPayment($payment, $signature->Sign($datta, $prKey));
print_r($rep->getPayment());

$signature = new \Helpers\Security\DigitalSignature\EccSignatureManager();
$ser = new \Helpers\Security\DigitalSignature\serializer();
$data = $ser->Serialise($rep->getPayment());
print_r($data);

$ver = $signature->Verify($data, $rep->getSignature(), $serKey);
var_dump($ver);
