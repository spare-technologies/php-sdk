<?php


namespace Payment\Client;


use GuzzleHttp\Exception\GuzzleException;
use Payment\Models\Payment\Domestic\SpCreateDomesticPaymentResponse;
use Payment\Models\Payment\Domestic\SpPaymentRequest;
use Payment\Models\Payment\Domestic\SpPaymentResponse;

interface ISpPaymentClient
{
    /**
     * Create domestic payment
     * @param SpPaymentRequest $payment
     * @param string $signature
     * @return SpCreateDomesticPaymentResponse
     * @throws GuzzleException
     * @throws SpPaymentSdkException
     */
    function CreateDomesticPayment(SpPaymentRequest $payment, string $signature): SpCreateDomesticPaymentResponse;

    /**
     * Get domestic payment
     * @param string $id
     * @return SpPaymentResponse
     * @throws GuzzleException
     * @throws SpPaymentSdkException
     */
    function GetDomesticPayment(string $id): SpPaymentResponse;

    /**
     * List domestic payments
     * @param int $start
     * @param int $perPage
     * @return array
     * @throws GuzzleException
     * @throws SpPaymentSdkException
     */
    function ListDomesticPayment(int $start, int $perPage): array;

}