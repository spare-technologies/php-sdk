<?php
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Payment\Client\SpPaymentClient(
    new \Payment\Client\SpPaymentClientOptions('https://dev.tryspare.com',
        'mHzLLIyaKyClbr5WPP8v3mqu1PLHfRqEJfaNkqXt/Og=',
        'deVF3jjcOggbtFJWiRN0M246lBpADD5MVvaowKJlFfg=')
);
 try {
    $rep = $client->GetDomesticPayment('05815914-83ca-4b0b-9cf2-13f7f353571d');
    print_r($rep);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
}


/* try {
    $list = $client->ListDomesticPayment(0, 10);
    print_r($list);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
} */


/* try {
    $rep = $client->CreateDomesticPayment(new \Payment\Models\Payment\Domestic\SpDomesticPayment(
        50, 'Test payment', 'https://surl.com', 'https://surl.com'
    ));
    print_r($rep);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
} */
