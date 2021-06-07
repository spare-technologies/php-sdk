<?php


namespace Payment\Client;


use Http\Promise\Promise;

interface ISpPaymentClient
{
    /**
     * @param SpDomesticPayment $payment
     * @return mixed
     */
    function CreateDomesticPayment(SpDomesticPayment $payment): Promise;

    /**
     * @param string $id
     * @return mixed
     */
    function GetDomesticPayment(string $id): Promise;

    /**
     * @param int $start
     * @param int $perPage
     * @return mixed
     */
    function ListDomesticPayment(int $start = 0, int $perPage = 100): Promise;

}