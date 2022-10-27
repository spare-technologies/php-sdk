<?php


namespace Payment\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Helpers\Serialization\SpSerializer;
use Payment\Models\Payment\Domestic\SpCreateDomesticPaymentResponse;
use Payment\Models\Payment\Domestic\SpPaymentRequest;
use Payment\Models\Payment\Domestic\SpPaymentResponse;
use Payment\Models\Response\SpSdkPaymentResponse;
use Payment\Models\Response\SpSdkPaymentsResponse;

class SpPaymentClient implements ISpPaymentClient
{

    public SpPaymentClientOptions $clientOptions;

    function __construct(SpPaymentClientOptions $ClientOptions)
    {
        $this->clientOptions = $ClientOptions;
    }

    /**
     * Create domestic payment
     * @param SpPaymentRequest $payment
     * @param string $signature
     * @return SpCreateDomesticPaymentResponse
     * @throws GuzzleException
     * @throws SpPaymentSdkException
     */
    public function CreateDomesticPayment(SpPaymentRequest $payment, string $signature): SpCreateDomesticPaymentResponse
    {
        $client = new Client([
            'timeout' => 10.0,
            'proxy' => $this->GetProxy(),
        ]);

        $request = new Request('POST', $this->buildUrl(SpEndPoints::$CreateDomesticPayment),
            $this->GetHeaders($signature), $payment->toJonsString());

        $response = $client->send($request);

        if ($response->getStatusCode() != 200) {
            throw new SpPaymentSdkException($response->getBody());
        }

        $responseData = SpSerializer::getDeserializer()->deserialize($response->getBody(), SpSdkPaymentResponse::class, 'json');

        return new SpCreateDomesticPaymentResponse($responseData->getData(), $response->getHeaderLine("x-signature"));
    }

    /**
     * Get domestic payment
     * @param string $id
     * @return SpPaymentResponse
     * @throws GuzzleException
     * @throws SpPaymentSdkException
     */
    public function GetDomesticPayment(string $id): SpPaymentResponse
    {
        $client = new Client([
            'timeout' => 10.0,
            'proxy' => $this->GetProxy(),
        ]);

        $request = new Request('GET', "{$this->buildUrl(SpEndPoints::$GetDomesticPayment)}?id=$id", $this->GetHeaders());

        $response = $client->send($request);

        if ($response->getStatusCode() != 200) {
            throw new SpPaymentSdkException($response->getBody());
        }

        $responseData = SpSerializer::getDeserializer()->deserialize($response->getBody(), SpSdkPaymentResponse::class, 'json');

        return $responseData->getData();
    }

    /**
     * List domestic payments
     * @param int $start
     * @param int $perPage
     * @return array
     * @throws GuzzleException
     * @throws SpPaymentSdkException
     */
    public function ListDomesticPayment(int $start, int $perPage): array
    {
        $client = new Client([
            'timeout' => 10.0,
            'proxy' => $this->GetProxy(),
        ]);

        $request = new Request('GET', "{$this->buildUrl(SpEndPoints::$ListDomesticPayment)}?start=$start&perPage=$perPage", $this->GetHeaders());

        $response = $client->send($request);

        if ($response->getStatusCode() != 200) {
            throw new SpPaymentSdkException($response->getBody());
        }

        $responseData = SpSerializer::getDeserializer()->deserialize($response->getBody(), SpSdkPaymentsResponse::class, 'json');

        return $responseData->getData();
    }

    /**
     * Build request URL
     * @param $endpoint
     * @return string
     */
    private function buildUrl($endpoint): string
    {
        return "{$this->clientOptions->baseUrl}{$endpoint}";
    }

    /**
     * Get request headers
     * @param string|null $signature
     * @return array
     */
    private function GetHeaders(?string $signature = null): array
    {
        $headers = array('app-id' => $this->clientOptions->appId,
            'x-api-key' => $this->clientOptions->appKey,
            'Content-Type' => 'application/json');
        if ($signature != null) {
            $headers['x-signature'] = $signature;
        }
        return $headers;
    }

    /**
     * Build proxy
     * @return string|null
     */
    private function GetProxy(): ?string
    {
        $proxy = $this->clientOptions->getProxy();

        if ($proxy == null || $proxy->getHost() == null) {
            return null;
        }

        $url = $proxy->getHost();

        if ($proxy->getPort() != null) {
            $url = $url . ':' . $proxy->getPort();
        }

        if ($proxy->getUsername() != null && $proxy->getPassword() != null) {
            return $proxy->getType() . '://' . $proxy->getUsername() . ':' . $proxy->getPassword() . '@' . $url;
        }

        return $proxy->getType() . '://' . $url;
    }
}