<?php


namespace Payment\Client;
require_once 'vendor/autoload.php';

class SpPaymentClient implements ISpPaymentClient
{
    private SpPaymentClientOptions $clientOptions;

    public function CreateDomesticPayment(SpDomesticPayment $payment)
    {
        // TODO: Implement CreateDomesticPayment() method.
    }
    public function GetDomesticPayment(string $id)
    {
        // TODO: Implement GetDomesticPayment() method.
    }
    public function ListDomesticPayment(int $start, int $perPage)
    {
        // TODO: Implement ListDomesticPayment() method.
    }


}