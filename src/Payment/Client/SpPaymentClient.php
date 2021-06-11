<?php


namespace Payment\Client;
use http\Client;
use Payment\Models\Payment\Domestic\SpDomesticPayment;

require_once 'vendor/autoload.php';

class SpPaymentClient implements ISpPaymentClient
{

    public SpPaymentClientOptions $clientOptions;

    function __construct(SpPaymentClientOptions $ClientOptions) {
        $this->clientOptions = $ClientOptions;
    }


    public function CreateDomesticPayment(SpDomesticPayment $payment)
    {
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('POST', $this->GetUrl(SpEndPoints::$CreateDomesticPayment),
            $this->GetHeaders(), json_encode($payment));
        $promise = $client->sendAsync($request);
        $promise->wait();
        return $promise;
    }
    public function GetDomesticPayment(string $id)
    {
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', "{$this->GetUrl(SpEndPoints::$GetDomesticPayment)}?id=$id", $this->GetHeaders());
        $promise = $client->sendAsync($request);
        $promise->wait();
        return $promise;
    }
    public function ListDomesticPayment(int $start, int $perPage)
    {
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', "{$this->GetUrl(SpEndPoints::$ListDomesticPayment)}?start=$start&perPage=$perPage" , $this->GetHeaders());
        $promise = $client->sendAsync($request);
        $promise->wait();
        return $promise;
    }

    private function GetUrl($endpoint): string {
        return "{$this->clientOptions->baseUrl}{$endpoint}";
    }

    private function GetHeaders(): array {
        return array('app-id' => $this->clientOptions->appId,
                     'x-api-key' => $this->clientOptions->appKey,
                     'Content-Type' => 'application/json');
}


}